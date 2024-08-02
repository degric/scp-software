<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('AdminController.home');
    }

    public function users(){
        return 'Aqui se van a mostrar todos los usuarios';
    }

    public function users_admins(){
        return 'usuarios administradores';
    }
}
