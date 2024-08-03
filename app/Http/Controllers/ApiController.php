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

    public function createUser(Request $request){
        $data = json_decode($request->getContent());
        $password = Hash::make($data->password);


        $user = User::create([
            'nombre' => $request->nombre,
            'password' => $password,
            'apellido_paterno'=> $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email'=> $request->email,
            'telefono' => $request->telefono,
            'usuario'=> $request->usuario,
            'tipo_usuario' => $request->tipo_usuario
        ]);

        return "Usuario creado exitosamente";
    }
    public function deleteUser($id){

        $response = ["status"=>0,"msg"=>""];

        $user = User::find($id);


        if(!$user){
            $response["msg"] = "Usuario no encontrado";
            $response["status"] = 404;
            return response()->json($response, 404);
        } 

        $user->delete();
        $response["status"] = 200;
        $response["msg"] = "Usuario eliminado";


        return response()->json($response);
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);
        
    }
}
