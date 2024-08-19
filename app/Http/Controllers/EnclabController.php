<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lab;
use App\Models\Computer;
class EnclabController extends Controller
{

    public function home(){
        $user = Auth::user(); 

        
        $labs = $user->labs;

       
        $data = new \stdClass();
        $data->user = $user;
        $data->labs = $labs;
        return view('Enclab.home', compact('data'));
       
    }

    public function showlabs(){

        $user = Auth::user(); 

        
        $labs = $user->labs;

       
        $data = new \stdClass();
        $data->user = $user;
        $data->labs = $labs;


        return view('Enclab.Labs.showlabs', compact('data'));
    }

    public function showlab($id){

        $user = Auth::user(); 
        
        $labs = $user->labs;
        $lab = Lab::find($id);

        $computers = Computer::where('lab_id', $id)->get();

        $data = new \stdClass();
        $data->user = $user;
        $data->labs = $labs;
        $data->lab = $lab;


        return view('Enclab.Labs.showlab', compact('data', 'computers'));
    }
}
