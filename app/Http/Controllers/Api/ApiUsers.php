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
        $response = ['status' => 0, 'msg' => ''];

        $data = json_decode($request->getContent());

        $user = User::where('usuario', $data->usuario)->first();

        if ($user) {
            $passwordUser = $user->getAttribute('password');
            if (Hash::check($data->password, $passwordUser)) {
                $token = $user->createToken('example');
                $response['msg'] = 'aqui todo bien';
                $response['status'] = 1;
                $response['msg'] = $token->plainTextToken;
            } else {
                $response['msg'] = 'Credenciales incorrectas';
            }
        } else {
            $response['msg'] = 'Usuario no encontrado';
        }

        return response()->json($response);
    }

    //Obtener todos los usuarios. (ruta: /api/getUsers/)
    public function getUsers(Request $request)
    {
        if ($request->has('tipo_usuario')) {
            $users = User::where('tipo_usuario', 'admin')->get();
        } else {
            $users = User::all();
        }

        return response()->json($users);
    }

    //Obtener un usuario. (ruta: /api/getUser/<id>)
    public function getUser(Request $request, $id)
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

        $dataActualizar = [
            'password' => $request->password,
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
