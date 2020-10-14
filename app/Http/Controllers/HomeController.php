<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partai;
use App\Models\Calon;
use App\Models\Tps;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $calon = Calon::find(Auth::user()->id_caleg);
        $sudah = Tps::where('status', 'sudah')->count();
        $belum = Tps::where('status', 'belum')->count();
        $persen = round($sudah / Tps::count() * 100, 2);
        $partais = Partai::all();
        $suaras = collect();
        foreach($partais as $partai){
            $partai = collect(['id_partai' => $partai->id_partai, 'suara' => $partai->tps()->sum('suara'), 'kursi' => 0, 'pembagi' => 1]);
            $suaras->push($partai);
        }
        while($suaras->sum('kursi') <= 4){
            foreach($suaras as $suara){
                if($suara['suara'] == $suaras->max('suara')){
                    $suara['suara'] = $suara['suara'] / $suara['pembagi'];
                    $suara['pembagi'] = $suara['pembagi']+2;
                    $suara['kursi'] = $suara['kursi']+1;
                }
            }
        }

        $kursi = $suaras->where('id_partai', Auth::user()->id_partai)->first()['kursi'];
        $calons = Calon::all();
        $calons = $calons->sortByDesc(function ($calon) {
            return $calon->tps()->sum('suara');
        })->take($kursi);

        return view('home', compact('partais','calons','calon','sudah','belum','persen','suaras'));
    }

    public function partai()
    {
        $partais = Partai::all();
        $calons = Calon::all();
        return view('partai', compact('partais', 'calons'));
    }    

    public function setting()
    {
        $calons = Calon::all();
        $partais = Partai::all();
        return view('setting', compact('partais', 'calons'));
    }  

    public function updateSetting(Request $request)
    {
        $user = User::find(Auth::id());
        $user->id_caleg = $request->id_caleg;
        $user->id_partai = $request->id_partai;
        $user->save();
        Auth::setUser($user);
        return redirect()->route('home');
    }  
    public function dataDashboard(){
        $calons = Calon::with('tps')->get();
        $partais = Partai::all();
        $color = ['#f56954', '#00a65a','#f56954', '#00a65a','#f56954', '#00a65a','#f56954', '#00a65a','#f56954', '#00a65a','#f56954', '#00a65a','#f56954', '#00a65a','#f56954', '#00a65a'];

        $suaraCalon = collect();
        foreach($calons as $calon){
            $suaraCalon->push($calon->tps()->sum('suara'));
        }
        
        $dataCalon = ['nama' => $calons->pluck('nama'), 'suara' => $suaraCalon];
        $dataPartai = array();
        foreach($partais as $key => $partai){
            $dataPartai[] = ['value' => $partai->tps()->sum('suara'), 'color' => $color[$key], 'highlight' => '#eee', 'label' => $partai->nama];
        }

        $data = ['calon' => $dataCalon, 'partai' => $dataPartai];
        return response()->json($data);
    }
}
