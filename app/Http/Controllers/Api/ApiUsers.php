<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiUsers extends Controller
{
    ///////////////////////// Usuarios.

    // Funcion para la autenticacion de los usuarios. (ruta: /api/login)
    public function login(Request $request)
    {
    

        if(!$request->usuario or !$request->password){
            return "datos faltantes";
        }
        $user = User::where('usuario', $request->usuario)->first();

        if ($user) {
            $passwordUser = $user->getAttribute('password');
            if (Hash::check($request->password, $passwordUser)) {
                $token = $user->createToken('example');
                return response()->json([
                    "msg"=> "Usuario autenticado",
                    "status" => 200,
                    "token" => $token->plainTextToken
                ]);
            } 

        return response()->json(["msg"=>"error"]);
    }}

    //Obtener todos los usuarios. (ruta: /api/getUsers/)
    public function getUsers()
    {
       
     $users = User::all();
        
        return response()->json($users);
    }

    //Obtener un usuario. (ruta: /api/getUser/<id>)
    public function getUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                "msg" => "Usuario No encontrado"
            ]);
        }

        return response()->json([
            "msg" => "Usuario Encontrado",
            "data" => $user
        ]);
    }



    // Funcion para crear un usuario (ruta: /api/createUser)
    public function createUser(Request $request)
    {
        $password = Hash::make($request->password);

        $user = User::create([
            'nombre' => $request->nombre,
            'password' => $password,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'usuario' => $request->usuario,
            'tipo_usuario' => $request->tipo_usuario,
        ]);



        return response()->json([
            "msg" => "Usuario creado exitosamente",
            "data" => $user
        ]);
    }





    // Eliminar un usuario a traves del ID (ruta: api/deleteUser/<id>)
    public function deleteUser($id)
    {


        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "msg" => "Usuario no encontrado",
                "status" => 404
            ]);
        }

        $user->delete();

        return response()->json([
            "msg" => "Usuario elimnado",
            "status" => 200,
            "data" => $user,
        ]);
    }





    // Actualizar usuario (ruta: /api/updateUser/<id>)
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "msg" => "Usuario no encontrado",
                "status" => 404
            ]);
        }
        $password = null;
        if($request->password){
            $password = Hash::make($request->password);
        }
        $dataActualizar = [
            'password' => $password,
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'usuario' => $request->usuario,
            'tipo_usuario' => $request->tipo_usuario,
        ];

        $dataActualizar = array_filter($dataActualizar, fn ($value) => !is_null($value));

        foreach ($dataActualizar as $field => $value) {
            $user->$field = $value;
        }
        $user->save();

        return response()->json([
            "msg" => "Usuario actualizado",
            "data" => $user,
            "status" => 200
        ]);
    }
}
