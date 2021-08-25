<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    protected $fillable = [
        'mod_nombre','mod_visible','mod_url','mod_img'
    ];

    public function permisos(){
        return $this->hasMany('App\Models\Permiso', 'modulos_id','id');
    }
}
