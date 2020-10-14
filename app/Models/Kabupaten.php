<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $primaryKey = 'id_kabupaten';

    protected $fillable = [
    	'nama', 'id_provinsi'
    ];

    public $timestamps = false;

    // many to one
    public function provinsi(){
    	return $this->belongsTo('App\Models\Provinsi','id_provinsi','id_provinsi');
    }

    // one to many
    public function kecamatan(){
    	return $this->hasMany('App\Models\Kecamatan','id_kabupaten','id_kabupaten');
    }

    // many through
    public function kelurahan()
    {
        return $this->hasManyThrough(
            'App\Models\Kelurahan',
            'App\Models\Kecamatan',
            'id_kabupaten', // Foreign key on users table...
            'id_kecamatan', // Foreign key on posts table...
            'id_kabupaten', // Local key on countries table...
            'id_kecamatan' // Local key on users table...
        );
    }    
}
