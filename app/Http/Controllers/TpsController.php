<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Tps;
use App\Models\Partai;
use App\Models\Calon;
use App\Models\Relawan;
use Auth;

class TpsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tpsProvinsi()
    {
        $provinsi = Provinsi::first();
        $calons = Calon::all();
        $partais = Partai::all();
        $calon = Calon::find(Auth::user()->id_caleg);
        return view('tps/provinsi', compact('provinsi','calons', 'partais', 'calon'));
    }    

    public function tpsKabupaten($idkabupaten)
    {
        $kabupaten = Kabupaten::find($idkabupaten);
        $idKelurahans = $kabupaten->kelurahan()->get()->pluck('id_kelurahan');
        $calons = Calon::all();
        $partais = Partai::all();
        $calon = Calon::find(Auth::user()->id_caleg);

        return view('tps/kabupaten', compact('kabupaten','idKelurahans','calons','partais','calon'));
    } 

    public function tpsKecamatan($idkecamatan)
    {
        $kecamatan = Kecamatan::find($idkecamatan);
        $idKelurahans = $kecamatan->kelurahan()->get()->pluck('id_kelurahan');
        $calons = Calon::all();
        $partais = Partai::all();
        $calon = Calon::find(Auth::user()->id_caleg);

        return view('tps/kecamatan', compact('kecamatan','idKelurahans', 'calons', 'partais', 'calon'));
    } 

    public function tpsKelurahan($idkelurahan)
    {
        $kelurahan = Kelurahan::find($idkelurahan);
        $calons = Calon::all();
        $partais = Partai::all();
        $calon = Calon::find(Auth::user()->id_caleg);

        return view('tps/kelurahan', compact('kelurahan', 'calons','partais', 'calon'));
    } 

    public function tps($idtps)
    {
        $tps = Tps::find($idtps);
        return view('tps/tps', compact('tps'));
    } 

    public function editRelawanTps($idtps){
        $tps = Tps::find($idtps);
        $relawans = Relawan::all();
        return view('tps/relawan', compact('tps', 'relawans'));
    }

    public function updateRelawanTps(Request $request, $idtps){
        $tps = Tps::find($idtps);
        $tps->id_relawan = $request->id_relawan;
        $tps->save();
        return redirect()->route('tpsKelurahan',[$tps->id_kelurahan]);
    }    
}
