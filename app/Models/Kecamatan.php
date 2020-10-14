<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';

    protected $fillable = [
    	'nama', 'id_kabupaten'
    ];

    public $timestamps = false;

    // many to one
    public function kabupaten(){
    	return $this->belongsTo('App\Models\Kabupaten','id_kabupaten','id_kabupaten');
    }

    // one to many
    public function kelurahan(){
    	return $this->hasMany('App\Models\Kelurahan','id_kecamatan','id_kecamatan');
    }

    public function tps()
    {
        return $this->hasManyThrough(
            'App\Models\Tps',
            'App\Models\Kelurahan',
            'id_kecamatan', // Foreign key on users table...
            'id_kelurahan', // Foreign key on posts table...
            'id_kecamatan', // Local key on countries table...
            'id_kelurahan' // Local key on users table...
        );
    }     
}
