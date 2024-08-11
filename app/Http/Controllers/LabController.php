<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Lab;
use Carbon\Carbon;

class LabController extends Controller
{
    public function create_view()
    {
        return view('LabController.create-view');
    }

    public function createLab(Request $request)
    {
        $lab = Lab::create([
            'nombre' => $request->nombre,
            'planta' => $request->planta,
            'red' => $request->red,
            'mascara_red' => $request->mascara_red
        ]);

        return redirect('/admin/lab/create');
    }

    public function management()
    {
        $data = Lab::all()->map(function ($lab) {

            $lab->created_at = Carbon::parse($lab->created_at)->setTimezone('America/Mexico_City');
            $lab->updated_at = Carbon::parse($lab->updated_at)->setTimezone('America/Mexico_City');
            return $lab;
        });


        return view('LabController.management-view', compact('data'));
    }

    public function deleteLab($id)
    {
        $lab = Lab::find($id);

        $lab->delete();
        return redirect('/admin/lab/management');
    }

    public function update_view($id)
    {

        $data = Lab::find($id);
        $data->created_at = Carbon::parse($data->created_at)->setTimezone('America/Mexico_City');
        $data->updated_at = Carbon::parse($data->updated_at)->setTimezone('America/Mexico_City');

        return view('LabController.update-view', compact('data'));
    }

    public function updateLab(Request $request, $id)
    {

        $lab = Lab::find($id);
        $data = [
            'nombre' => $request->nombre,
            'planta' => $request->planta,
            'red' => $request->red,
            'mascara_red' => $request->mascara_red
        ];

        $data = array_filter($data, fn($value) => !is_null($value));

        foreach ($data as $field => $value) {
            $lab->$field = $value;
        }

        $lab->save();

        return redirect('/admin/lab/management');
    }
}
