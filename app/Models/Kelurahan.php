<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';

    protected $fillable = [
    	'nama', 'id_kecamatan'
    ];

    public $timestamps = false;

    // many to one
    public function kecamatan(){
    	return $this->belongsTo('App\Models\Kecamatan','id_kecamatan','id_kecamatan');
    }

    // one to many
    public function tps(){
    	return $this->hasMany('App\Models\Tps','id_kelurahan','id_kelurahan');
    }
}
