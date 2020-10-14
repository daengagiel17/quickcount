<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Relawan extends Authenticatable
{
    use Notifiable;

    protected $table = 'relawan';
    protected $primaryKey = 'id_relawan';

    protected $fillable = [
        'nama', 'no_hp', 'photo', 'api_token'
    ];

    protected $hidden = [
        'remember_token'
    ];
    
    // one to many
    public function tps(){
        return $this->hasMany('App\Models\Tps','id_relawan','id_relawan');
        // (Class relasi, foreign_key di class relasi, primary di local)
    }
}