<?php

use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Tps;

class TpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinsi = new Provinsi;
        $provinsi->nama = "Nusa Tenggara Barat";
        $provinsi->save();

        $kabupatens = ['Lombok Utara', 'Lombok Barat'];
        $kecamatans = 
        [
            ['Bayan', 'Gangga', 'Kayangan', 'Pemenang', 'Tanjung'],
            ['Batu Layar', 'Gerung', 'Gunungsari', 'Kediri', 'Kuripan', 'Labuapi', 'Lembar', 'Lingsar', 'Narmada', 'Sekotong']
        ];

        $kelurahans = 
        [
            ['Akar-akar', 'Anyar', 'Bayan', 'Karang Bajo', 'Loloan', 'Mumbul Sari', 'Sambik Elen', 'Senaru', 'Sukadana'],
            ['Bentek', 'Genggelang', 'Gondang', 'Rempek', 'Sambik Bangkol'],
            ['Dangiang', 'Gumantar', 'Kayangan', 'Pendua', 'Salut', 'Santong', 'Selengen', 'Sesait'],
            ['Gili Indah', 'Malaka', 'Pemenang Barat', 'Pemenang Timur'],
            ['Jenggala', 'Medana', 'Sigar Penjalin', 'Sokong', 'Tanjung', 'Tegal Maja', 'Teniga'],
            ['Batu Layar', 'Batu Layar Barat', 'Bengkaung', 'Lembahsari', 'Meninting', 'Pusuk Lestari', 'Sandik', 'Senggigi', 'Senteluk'],
            ['Babussalam', 'Banyu Urip', 'Beleke', 'Dasan Geres', 'Dasan Tapen', 'Gapuk', 'Gerung Selatan', 'Gerung Utara', 'Giri Tembesi', 'Kebon Ayu', 'Mesanggok', 'Suka Makmur', 'Taman Ayu', 'Tempos'],
            ['Bukitinggi', 'Dopang', 'Gelangsar', 'Guntur Macan', 'Gunungsari', 'Jatisela', 'Jeringgo', 'Kekait', 'Kekeri', 'Mambalan', 'Mekarsari', 'Midang', 'Penimbung', 'Ranjok', 'Sesela', 'Taman Sari'],
            ['Banyumulek', 'Dasan Baru', 'Gelogor', 'Jagaraga Indah', 'Kediri', 'Kediri Selatan', 'Lelede', 'Montong Are', 'Ombe Baru', 'Rumak'],
            ['Giri Sasak', 'Jagaraga', 'Kuripan', 'Kuripan Selatan', 'Kuripan Timur', 'Kuripan Utara'],
            ['Bagik Polak', 'Bagik Polak Barat', 'Bajur', 'Bengkel', 'Karang Bongkot', 'Kuranji', 'Kuranji Dalang', 'Labuapi', 'Merembu', 'Perampuan', 'Telagawaru', 'Terong Tawah'],
            ['Eyat Mayang', 'Jembatan Gantung', 'Jembatan Kembar', 'Jembatan Kembar Timur', 'Labuan Tereng', 'Lembar', 'Lembar Selatan', 'Mareje', 'Mareje Timur', 'Sekotong Timur'],
            ['Batu Kumbung', 'Batu Mekar', 'Bug-bug', 'Dasan Geria', 'Duman', 'Gegelang', 'Gegerung', 'Giri Madia', 'Gontoran', 'Karang Bayan', 'Langko', 'Lingsar', 'Peteluan Indah', 'Saribaye', 'Sigerongan'],
            ['Badrain', 'Batu Kuta', 'Buwun Sejati', 'Dasan Tereng', 'Gerimax Indah', 'Golong', 'Keru', 'Krama Jaya', 'Lebah Sempaga', 'Lembuak', 'Mekarsari', 'Narmada', 'Nyur Lembang', 'Pakuan', 'Peresak', 'Sedau', 'Selat', 'Sembung', 'Sesaot', 'Suranadi', 'Tanak Beak'],
            ['Batu Putih', 'Buwun Mas', 'Cendi Manik', 'Gili Gede Indah', 'Kedaro', 'Pelangan', 'Sekotong Barat', 'Sekotong Tengah', 'Taman Baru'],
        ];

        $tpss = 
        [
            [ 19, 14, 12, 9, 10, 11, 8, 17, 18],
            [ 20, 25, 21, 17, 17],
            [ 7, 14, 14, 7, 9, 15, 14, 24],
            [ 6, 19, 31, 20],
            [ 19, 11, 21, 28, 21, 14, 6],
            [ 12, 11, 7, 6, 11, 4, 23, 8, 8],
            [ 14, 14, 13, 15, 11, 8, 14, 11, 6, 12, 8, 10, 11, 9],
            [ 5, 4, 5, 6, 14, 13, 4, 13, 9, 5, 8, 13, 5, 4, 20, 18],
            [ 15, 7, 11, 10, 15, 10, 6, 10, 9, 8],
            [ 7, 15, 16, 9, 6, 16],
            [ 7, 7, 16, 16, 14, 5, 5, 6, 10, 11, 9, 12],
            [ 4, 11, 7, 10, 12, 9, 21, 6, 6, 8],
            [ 14, 18, 5, 7, 7, 7, 7, 5, 4, 8, 11, 9, 6, 4, 10],
            [ 7, 5, 7, 8, 7, 9, 9, 8, 9, 10, 5, 8, 6, 6, 12, 8, 11, 6, 9, 11, 9],
            [ 11, 25, 10, 5, 11, 14, 15, 14, 9],
        ];


        $var_kec = 0;
        for($kab = 0; $kab < sizeof($kabupatens); $kab++){
            $kabupaten = new Kabupaten;
            $kabupaten->nama = $kabupatens[$kab];
            $kabupaten->id_provinsi = $provinsi->id_provinsi;
            $kabupaten->save();    
            for($kec = 0; $kec < sizeof($kecamatans[$kab]); $kec++){
                $kecamatan = new Kecamatan;
                $kecamatan->nama = $kecamatans[$kab][$kec];
                $kecamatan->id_kabupaten = $kabupaten->id_kabupaten;
                $kecamatan->save();      
                
                for($kel = 0; $kel < sizeof($kelurahans[$var_kec]); $kel++){
                    $kelurahan = new Kelurahan;
                    $kelurahan->nama = $kelurahans[$var_kec][$kel];
                    $kelurahan->id_kecamatan = $kecamatan->id_kecamatan;
                    $kelurahan->save(); 

                    for($tempat =0; $tempat < $tpss[$var_kec][$kel]; $tempat++){
                        $tps = new Tps;
                        $tps->nama = "TPS ".($tempat+1);
                        $tps->id_kelurahan = $kelurahan->id_kelurahan;
                        $tps->save();                         
                    }
                }
                $var_kec++;
            }
        }

    }
}
