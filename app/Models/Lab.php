<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'planta',
        'red',
        'mascara_red',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'lab_user', 'lab_id', 'user_id');
    }
}
