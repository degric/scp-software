<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Lab;

class ApiLabs extends Controller
{
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
                 "msg" => "No se pudo crear el laboratorio", 
                 "status" => 500
             ]);
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
}
