<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tps;
use App\Models\Calon;
use App\Models\Partai;
use App\Models\Relawan;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:relawan-api', ['except' => ['login']]);
    }

// - Login Relawan
// + Type = Get
// + Request = nomor_hp
// + Response = detail relawan
// * Proses 
// 	- Validate
// 	- Get nomor_hp
// 	- Autentikasi
// 	- return data relawan
    public function login($nomor_hp)
    {
        // Get by nomor_hp
        $relawan = Relawan::where('no_hp', $nomor_hp)->first();

        if(empty($relawan))
        {
            //if relawan == null
            return response()->json("Relawan tidak terdaftar");
        }
        // elseif(Hash::check( $request->password, $relawan->password) == false)
        // {
        //     //Password salah
        //     return response()->json("Password anda salah");
        // }

        return response()->json($relawan);
    }

// - Tps
// 	+ type = get
// 	+ Request = id_relawan
// 	+ Response = data tpss, partaiss, calons
// 	* Proses 
// 		- Get data tps by id_relawan
// 		- 
// 		- return data tps, calons, partais
    public function tps($id_relawan)
    {
        $data = Tps::with('calon', 'partai')->where('id_relawan', $id_relawan)->get();

        return response()->json($data);
    }

// - Update Tps
// 	+ type = post
// 	+ Request = data { photo_c1, id_tps}
// 	+ Response = status success
// 	* Proses 
// 		- Get data tps by id_tps
// 		- Change data tps
// 		- return status
    public function updateTps(Request $request)
    {
        $imageName = time().'.'.request()->photo_c1->getClientOriginalExtension();
        request()->photo_c1->move(public_path('image/photo_c1'), $imageName);

        $tps = Tps::find($request->id_tps);
        $tps->photo_c1 = $imageName;
        $tps->save();
        $this->statusTps($tps->id_tps);

        return response()->json("Success");
    }

// - Update SuaraCalon
// 	+ type = post
// 	+ Request = data { id_tps, calon { id_calon, suara}}
// 	+ Response = status access
// 	* Proses 
// 		- Get data SuaraCalon by id_tps
// 		- Change data SuaraCalon
// 		- return status
    public function updateSuaraCalon(Request $request)
    {
        $tps = Tps::find($request->id_tps);
        foreach($request->calon as $calon){
            $tps->calon()->updateExistingPivot($calon['id_calon'], ['suara' => $calon['suara'], 'status' => 'sudah']);
        }
        $this->statusTps($tps->id_tps);

        return response()->json("Success");
    }

// - Update SuaraPartai
// 	+ type = post
// 	+ Request = data { id_tps, partai { id_partai, suara}}
// 	+ Response = status access
// 	* Proses 
// 		- Get data Partai by id_tps
// 		- Change data Partai
// 		- return status
    public function updateSuaraPartai(Request $request)
    {
        $tps = Tps::find($request->id_tps);
        foreach($request->partai as $partai){
            $tps->partai()->updateExistingPivot($partai['id_partai'], ['suara' => $partai['suara'], 'status' => 'sudah']);
        }
        $this->statusTps($tps->id_tps);

        return response()->json("Success");
    }

// Ubah Status TPS apabila semua data calon, partai, dan photo C1 sdh masuk pada tps tersebut
    public function statusTps($id_tps){
        $tps = Tps::find($id_tps);
        if(!($tps->calon()->where('status', 'belum')->exists() || $tps->partai()->where('status', 'belum')->exists() || $tps->photo_c1 == null)){
            $tps->status = "sudah";
            $tps->save();
        }
        return true;
    }
}
