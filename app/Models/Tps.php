<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    protected $table = 'tps';
    protected $primaryKey = 'id_tps';

    protected $fillable = [
    	'nama', 'id_kelurahan', 'id_relawan', 'photo_c1', 'status'
    ];

    // many to one
    public function kelurahan(){
    	return $this->belongsTo('App\Models\Kelurahan','id_kelurahan','id_kelurahan');
    }

    // many to one
    public function relawan(){
        return $this->belongsTo('App\Models\Relawan','id_relawan','id_relawan');
    }

    // many to many
    public function calon(){
        return $this->belongsToMany('App\Models\Calon','suara_calon','id_tps','id_calon')->withPivot('suara');
        // (Class relasi, nama tabel, primary_key tabel1, primary_key tabel2)
    }  

    // many to many
    public function partai(){
        return $this->belongsToMany('App\Models\Partai','suara_partai','id_tps','id_partai')->withPivot('suara');
        // (Class relasi, nama tabel, primary_key tabel1, primary_key tabel2)
    } 
    
}
