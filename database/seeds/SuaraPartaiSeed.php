<?php

use Illuminate\Database\Seeder;
// use App\Models\SuaraPartai;
use App\Models\Partai;
use App\Models\Tps;
use App\Models\Calon;

class SuaraPartaiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partai = Partai::all();
        $calon = Calon::all();

        $tpss = Tps::all();
        foreach($tpss as $tps){
            $tps->partai()->attach($partai, ['suara' => 0, 'status' => "belum"]);
            $tps->calon()->attach($calon, ['suara' => 0, 'status' => "belum"]);
        }
    }
}
