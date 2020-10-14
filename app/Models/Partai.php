<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    protected $table = 'partai';
    protected $primaryKey = 'id_partai';

    protected $fillable = [
    	'nama', 'logo', 'nomor_urut'
    ];

    // one to many
    public function calon(){
    	return $this->hasMany('App\Models\Calon','id_partai','id_partai');
        // (Class relasi, foreign_key, primary_key)
    } 

    // many to many
    public function tps(){
        return $this->belongsToMany('App\Models\Tps','suara_partai','id_partai','id_tps')->withPivot('suara');
        // (Class relasi, nama tabel, primary_key tabel1, primary_key tabel2)
    }
}
