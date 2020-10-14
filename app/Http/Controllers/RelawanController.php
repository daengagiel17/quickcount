<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relawan;
use File;

class RelawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $relawans = Relawan::all();        
        return view('relawan', compact('relawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_relawan' => 'required',
            'nomor_hp' => 'required',
            'foto_relawan' => 'required|image|mimes:jpeg,png,jpg|max:6144',
        ],[
            'nama_relawan.required' => 'Nama relawan is required',
            'tgl_booking.required' => 'Nomor handphone is required',
            'foto_relawan.required' => 'Foto relawan is required',
            'foto_relawan.mimes' => 'Foto relawan type is jpeg/jpg/png',
            'foto_relawan.max' => 'Foto relawan maksimal 6 MB'
        ]);

        $imageName = time().'.'.request()->foto_relawan->getClientOriginalExtension();
        request()->foto_relawan->move(public_path('image/relawan'), $imageName);

        $relawan = new Relawan;
        $relawan->nama = $request->nama_relawan;
        $relawan->no_hp = $request->nomor_hp;
        $relawan->photo = $imageName;
        $relawan->api_token = str_random(100);
        $relawan->save();

        return redirect()->route('relawan.index');
    }

    public function edit($id){
        $relawan = Relawan::find($id);
        return view('relawan_edit', compact('relawan'));
    }

    public function update(Request $request, $id){
        $relawan = Relawan::find($id);
        if($request->foto_relawan){
            File::delete('image/relawan/'.$relawan->photo);
            $imageName = time().'.'.request()->foto_relawan->getClientOriginalExtension();
            request()->foto_relawan->move(public_path('image/relawan'), $imageName);
            $relawan->photo = $imageName;
        }
        $relawan->nama = $request->nama_relawan;
        $relawan->no_hp = $request->nomor_hp;
        $relawan->save();
        return redirect()->route('relawan.index');
    }

    public function destroy($id)
    {  
       $relawan = Relawan::findOrFail($id);
       $relawan->delete();
       File::delete('image/relawan/'.$relawan->photo);

        return response()->json($relawan);
    }

}