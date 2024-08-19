<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
  
    protected $table = 'devices';
    protected $fillable = ['ip', 'mac', 'fecha_conexion', 'fin_conexion', 'network_id', 'sistema_operativo'];
}
