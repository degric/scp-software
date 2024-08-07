<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Network;

class ApiNetworks extends Controller
{
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
