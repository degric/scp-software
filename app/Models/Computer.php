<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $table = 'computers';
    protected $fillable = ['ip', 'mac', 'fecha_conexion', 'fin_conexion', 'lab_id', 'sistema_operativo'];

}
