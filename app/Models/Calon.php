<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    protected $table = 'calon';
    protected $primaryKey = 'id_calon';

    protected $fillable = [
    	'nama', 'photo', 'id_partai', 'nomor_urut'
    ];

    // many to one
    public function partai(){
    	return $this->belongsTo('App\Models\Partai','id_partai','id_partai');
        // (Class relasi, foreign_key, primary_key)
    } 

    // many to many
    public function tps(){
        return $this->belongsToMany('App\Models\Tps','suara_calon','id_calon','id_tps')->withPivot('suara');
        // (Class relasi, nama tabel, primary_key tabel1, primary_key tabel2)
    }    
}
