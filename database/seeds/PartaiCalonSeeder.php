<?php

use Illuminate\Database\Seeder;
use App\Models\Partai;
use App\Models\Calon;

class PartaiCalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partai = new Partai;
        $partai->nama = "PKB";
        $partai->nomor_urut = 1;
        $partai->logo = "pkb.png";
        $partai->save();

        $partai = new Partai;
        $partai->nama = "GERINDRA";
        $partai->logo = "gerindra.jpg";
        $partai->nomor_urut = 2;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "PDIP";
        $partai->logo = "pdip.png";
        $partai->nomor_urut = 3;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "GOLKAR";
        $partai->logo = "golkar.png";
        $partai->nomor_urut = 4;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "NASDEM";
        $partai->logo = "nasdem.png";
        $partai->nomor_urut = 5;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "GARUDA";
        $partai->logo = "garuda.jpg";
        $partai->nomor_urut = 6;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "BERKARYA";
        $partai->logo = "berkarya.jpeg";
        $partai->nomor_urut = 7;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "PKS";
        $partai->logo = "pks.jpg";
        $partai->nomor_urut = 8;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "PERINDO";
        $partai->logo = "perindo.jpeg";
        $partai->nomor_urut = 9;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "PPP";
        $partai->logo = "ppp.png";
        $partai->nomor_urut = 10;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "PSI";
        $partai->logo = "psi.png";
        $partai->nomor_urut = 11;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "PAN";
        $partai->logo = "pan.png";
        $partai->nomor_urut = 12;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "HANURA";
        $partai->logo = "hanura.jpg";
        $partai->nomor_urut = 13;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "DEMOKRAT";
        $partai->logo = "demokrat.png";
        $partai->nomor_urut = 14;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "PBB";
        $partai->logo = "pbb.jpg";
        $partai->nomor_urut = 19;
        $partai->save();

        $partai = new Partai;
        $partai->nama = "PKPI";
        $partai->logo = "pkpi.png";
        $partai->nomor_urut = 20;
        $partai->save();

        for($i=1 ; $i<13; $i++){
            $calon = new Calon;
            $calon->nama = "Dika".$i;
            $calon->id_partai = 1;
            $calon->nomor_urut = $i;
            $calon->save();
        }
    }
}
