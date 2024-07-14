<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempUserController extends Controller
{
    public function index(Request $request){


        

        #return view('TempuserController.home');
        $ip = $this->getClientIP();
        $networkState = 90;
        return view('TempUserController.home', ['ip' => $ip, 'networkState' => $networkState]);
    }

    public function comments(){
        return view('TempUserController.comentarios');
    }


    private function getClientIP()
    {
        $clientIP = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $clientIP = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $clientIP = $_SERVER['REMOTE_ADDR'];
        }
        return $clientIP;
    }

}
