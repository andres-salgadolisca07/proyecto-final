<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;
    public $table='opciones';
    public $fillable=['nombres','dependencia_id'];
    public function dependencia() { return $this->hasOne('App\Models\Dependencia','id', 'dependencia_id'); }
}

