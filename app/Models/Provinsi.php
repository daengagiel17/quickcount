<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $primaryKey = 'id_provinsi';

    protected $fillable = [
    	'nama'
    ];

    public $timestamps = false;

    // one to many
    public function kabupaten(){
    	return $this->hasMany('App\Models\Kabupaten','id_provinsi','id_provinsi');
        // (Class relasi, foreign_key, primary_key)
    }

    public function kecamatan()
    {
        return $this->hasManyThrough(
            'App\Models\Kecamatan',
            'App\Models\Kabupaten',
            'id_provinsi', // Foreign key on users table...
            'id_kabupaten', // Foreign key on posts table...
            'id_provinsi', // Local key on countries table...
            'id_kabupaten' // Local key on users table...
        );
    }  
}
