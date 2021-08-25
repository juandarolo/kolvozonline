<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $fillable = [
        'permiso_nombre'
    ];

    public function modulos(){
        return $this->belongsTo('App\Models\Modulo', 'modulos_id','id');
    }

    public function users(){
        return $this->belongsTo('App\Models\User', 'users_id','id');
    }
}
