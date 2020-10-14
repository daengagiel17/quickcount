<?php

use Illuminate\Database\Seeder;
use App\Models\Relawan;

class RelawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relawan = new Relawan;
        $relawan->nama = "Indra";
        $relawan->no_hp = "+6285819910714";
        $relawan->api_token = str_random(100);
        $relawan->save();

        for($i = 0 ; $i<10 ; $i++){
            $relawan = new Relawan;
            $relawan->nama = "Indra".$i;
            $relawan->no_hp = "+6285819910714".$i;
            $relawan->api_token = str_random(100);
            $relawan->save();
        }
    }
}
