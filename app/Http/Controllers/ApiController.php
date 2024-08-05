<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lab;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
   
///////////////////////// Usuarios. 

    // Funcion para la autenticacion de los usuarios. (ruta: /api/login)
    public function login(Request $request){
        
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

    //Obtener todos los usuarios. (ruta: /api/getUsers/)
     public function getUsers(Request $request){
        if($request->has('tipo_usuario')){
            $users = User::where('tipo_usuario','admin')->get();

        }  else{
             $users = User::all();
        }     


       
        return response()->json($users);
    }

    //Obtener un usuario. (ruta: /api/getUser/<id>)
    public function getUser(Request $request, $id){
        $user = User::find($id);
        return $user;
    }

    // Funcion para crear un usuario (ruta: /api/createUser)
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

    // Eliminar un usuario a traves del ID (ruta: api/deleteUser/<id>)
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

    // Actualizar usuario (ruta: /api/updateUser/<id>)
    public function updateUser(Request $request, $id){
        $user = User::find($id);
        
        $dataActualizar = [
            'password' => $request->has('password') ? Hash::make($request->password) : null,
            'nombre' => $request->has('nombre') ? $request->nombre : null,
            'apellido_paterno' => $request->has('apellido_paterno') ? $request->apellido_paterno : null,
            'apellido_materno' => $request->has('apellido_materno') ? $request->apellido_materno : null,
            'email' => $request->has('email') ? $request->email : null,
            'telefono' => $request->has('telefono') ? $request->telefono : null,
            'usuario' => $request->has('usuario') ? $request->usuario : null,
            'tipo_usuario' => $request->has('tipo_usuario') ? $request->tipo_usuario : null,

        ];

        $dataActualizar = array_filter($dataActualizar, fn($value) => !is_null($value));

        foreach ($dataActualizar as $field => $value) {
            $user->$field = $value;
        }
        $user->save();
        return $user;
    }
/////////////// Laboratorios 

    // Crear laboratorio (ruta: /api/crateLab/)
    public function createLab(Request $request){
        
        $lab = Lab::create([
            'nombre' => $request->nombre,
            'planta' => $request->planta,
            'red' => $request->red,
            'mascara_red' => $request->mascara_red,  

        ]);

        if(!$lab){
            $response = [
            "msg" => "No se pudo. "
        ];
        }

        $response = [
            "msg" => "Si se pudo. ",
            "lab" => $lab
        ];

        return $response;
    }

    // Obtener laboratorios (ruta: /api/getLabs)
    public function getLabs(){
        $labs = Lab::all();
        return $labs;
    }

    // Obtener un laboratorio (ruta: /api/getLab/<id>)
    public function getLab($id){
        $lab = Lab::find($id);

        if(!$lab){
            $response = [
                'msg' => "No existe el laboratorio."
            ];
            return $response;
        }

        $response = [
            "msg" => "Si se pudo",
            'status' => 200,
            "lab" => $lab
        ];

        return $response;
    }
    // Eliminar laboratorios (ruta: /api/deleteLab/<id>)
    public function deleteLab($id){

        $lab = Lab::find($id);


        if(!$lab){
            $response = [
                "msg" => "No existe el laboratorio.",
                "status" => 404
            ];
            return response()->json($response, 404);
            } 

        $lab->delete();

        $response = [
            "msg" => "Laboratorio eliminado",
            "laboratorio eliminado" => $lab
        ];

        return response()->json($response, 200);
    }


    // Actualizar laboratorio (ruta: /api/updateLab/<id>)
    public function updateLab(Request $request, $id){
        $lab = Lab::find($id);

        if(!$lab){
            $response = [
                "msg" => "No existe el laboratorio.",
                "status" => 404,
            ];
            return $response;
        }

        $dataActualizar = [
            "nombre" => $request->nombre, 
            "planta" => $request->planta,
            "red" => $request->red,
            "mascara_red" => $request->mascara_red,
        ];

        $dataActualizar = array_filter($dataActualizar, fn($value) => !is_null($value));
        foreach ($dataActualizar as $field => $value) {
            $lab->$field = $value;
        }
        $lab->save();

        $response = [
            "msg" => "Laboratorio actualizado.",
            "laboratorio" => $lab,
            'laboratorio actualizado' => Lab::find($id),
        ];
        return $response;

    }

}
 
