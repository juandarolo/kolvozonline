<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $fillable = [
        'rol_nombre'
    ];

    public function usuario(){
        return $this->hasMany('App\Models\User', 'rols_id','id');
    }

}
