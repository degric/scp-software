<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function users(Request $request)
    {
        if($request->has('tipo_usuario')){
            $users = User::where('tipo_usuario','admin')->get();

        }  else{
             $users = User::all();
        }     


       
        return response()->json($users);
    }

    public function login(Request $request)
    {
        
        $response = ["status"=> 0, "msg"=>""];
        
        $data = json_decode($request->getContent());

        $user = User::where('usuario', $data->usuario)->first();
        

       
        if($user){
        
        $passwordUser = $user->getAttribute('password');
            if(Hash::check($data->password,$passwordUser)){
                
                $token = $user->createToken('example');
                $response['msg'] = 'aqui todo bien';
                $response['status'] = 1;
                $response['msg'] = $token->plainTextToken;
            }else {
                $response['msg']= 'Credenciales incorrectas';
            }
        }else {
            $response['msg'] = "Usuario no encontrado";
        } 
        
        
        return response()->json($response);
    }
}
