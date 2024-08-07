<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lab;
use App\Models\Network;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
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
        if(!$user){
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
            "data" => $usuario
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
            "data" => $usuario, 
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    }
    /////////////// Laboratorios

    // Crear laboratorio (ruta: /api/crateLab/)
    public function createLab(Request $request)
    {
        $lab = Lab::create([
            'nombre' => $request->nombre,
            'planta' => $request->planta,
            'red' => $request->red,
            'mascara_red' => $request->mascara_red,
        ]);

        if (!$lab) {
            $response = [
                'msg' => 'No se pudo. ',
            ];

            return response()->json([
                "msg" => No se pudo crear el laboratorio, 
                "status" => 500
            ])
        }


        return response()->json([
            "msg" => "Laboratorio creado",
            "data" => $lab,
            "status" => 200
        ]);
    }








    // Obtener laboratorios (ruta: /api/getLabs)
    public function getLabs()
    {
        $labs = Lab::all();
        return $labs;
    }

    // Obtener un laboratorio (ruta: /api/getLab/<id>)
    public function getLab($id)
    {
        $lab = Lab::find($id);

        if (!$lab) {
            $response = [
                'msg' => 'No existe el laboratorio.',
            ];
            return $response;
        }

        $response = [
            'msg' => 'Si se pudo',
            'status' => 200,
            'lab' => $lab,
        ];

        return $response;
    }




    
    // Eliminar laboratorios (ruta: /api/deleteLab/<id>)
    public function deleteLab($id)
    {
        $lab = Lab::find($id);

        if (!$lab) {
            $response = [
                'msg' => 'No existe el laboratorio.',
                'status' => 404,
            ];
            return response()->json($response, 404);
        }

        $lab->delete();

        $response = [
            'msg' => 'Laboratorio eliminado',
            'laboratorio eliminado' => $lab,
        ];

        return response()->json($response, 200);
    }

    // Actualizar laboratorio (ruta: /api/updateLab/<id>)
    public function updateLab(Request $request, $id)
    {
        $lab = Lab::find($id);

        if (!$lab) {
            $response = [
                'msg' => 'No existe el laboratorio.',
                'status' => 404,
            ];
            return $response;
        }

        $dataActualizar = [
            'nombre' => $request->nombre,
            'planta' => $request->planta,
            'red' => $request->red,
            'mascara_red' => $request->mascara_red,
        ];

        $dataActualizar = array_filter($dataActualizar, fn ($value) => !is_null($value));
        foreach ($dataActualizar as $field => $value) {
            $lab->$field = $value;
        }
        $lab->save();

        $response = [
            'msg' => 'Laboratorio actualizado.',
            'laboratorio' => $lab,
            'laboratorio actualizado' => Lab::find($id),
        ];
        return $response;
    }

    ///////////// Redes 

    // Crear Redes (ruta: /api/createNetwork, metodo: post)
    public function createNetwork(Request $request){

        $network = Network::create([
            'nombre' => $request->nombre,
            'ip' => $request->ip,
            'mascara_red' => $request->mascara_red,
            'tipo_red' => $request->tipo_red
        ]);

        if(!$network){
            return response()->json([
                "msg"=> "Error al crear la red.",
                "status"=>404
            ]);
        }

        return response()->json([
            "msg" => "Red creada",
            "red:" => $network
        ]);
    }
    // Obtener Redes (ruta: /api/getNetworks, metodo: get)
    public function getNetworks(){
        $networks = Network::all();

        if(!$networks){
            return response()->json([
                "msg"=> "Error al obtener las redes. ",
                "status" => 404
            ]);
        }

        return response()->json([
            "msg"=>"Redes Obtenidas exitosamente",
            "data"=> $networks,
            "status"=> 200
        ]);
    }

    // Obtener una Red (ruta: /api/getNetwork/<id>, metodo: get, parametro: id)
    public function getNetwork($id){
        $network = Network::find($id);

        if(!$network){
            return response()->json([
                "msg" => "Erro al obtener la red.",
                "status"=> 404
            ]);
        }

        return response()->json([
            "msg"=>"Red obtenida exitosamente",
            "data"=> $network,
            "status" => 200
        ]);
    }


    // Actualizar una red (ruta: /api/updateNetwork/ metodo:post, parametro: id)
    public function updateNetwork(Request $request, $id){
        $network = Network::find($id);

        if(!$network){
            return response()->json([
                "msg"=> "Red no encontrada.",
                "status" => 404
            ]);
        }

        $dataActualizar = [
            "nombre" => $request->nombre,
            "ip" => $request->ip,
            "mascara_red" => $request->mascara_red,
            "tipo_red" => $request->tipo_red,
        ];

        $dataActualizar = array_filter($dataActualizar, fn ($value) => !is_null($value));
        foreach ($dataActualizar as $field => $value) {
            $network->$field = $value;
        }


        $network->save();
        

        return response()->json([
            "msg" => "Red Actualizada",
            "status" => 200,
            "data" => $network,
        
        ]);

    }
    // Eliminar una red (ruta: /api/deleteNetwork, metodo:delete, parametro: id)

    public function deleteNetwork($id){

        $network = Network::find($id);


        if(!$network){
            return response()->json([
                "msg" => "Red no encontrada",
                "status" => 404,
            ]);
        }



        $network->delete();

        return response()->json([
            "msg"=> "Red eliminada",
            "data"=> $network,
            "status"=> 200
        ]);
    }

}
