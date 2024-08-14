<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\Lab;
use App\Models\Network;

class AdminController extends Controller



{


    
    public function admin()
    {
        $labs = Lab::all();

        $networks = Network::all();

        
        return view('AdminController.home', compact('labs', 'networks'));
    }

}