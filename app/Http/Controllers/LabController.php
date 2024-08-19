<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Network;
use App\Models\Lab;
use App\Models\Computer;

class LabController extends Controller
{

    protected $data;
    public function __construct()
    {
        // Inicializar la propiedad $data
        $this->data = new \stdClass();
        $this->data->networks = Network::all();
        $this->data->labs = Lab::all();
    }




    public function showLabsView()
    {
        $data = $this->data;

        return view('Admin.Labs.labs_view', compact('data'));
    }



    public function showCreateFormLab()
    {
        $data = $this->data;

        return view('Admin.Labs.create_view', compact('data'));
    }



    public function createLab(Request $request)
    {
        $lab = Lab::create([
            'nombre' => $request->nombre,
            'planta' => $request->planta,
            'red' => $request->red,
            'mascara_red' => $request->mascara_red
        ]);

        return redirect('/admin/labs');
    }

    public function deleteLab($id)
    {
        $lab = Lab::find($id);

        $lab->delete();
        return redirect('/admin/labs');
    }


    public function showUpdateLab($id)
    {
        $data = $this->data;



        $lab = Lab::find($id);
        $lab->created_at = Carbon::parse($lab->created_at)->setTimezone('America/Mexico_City');
        $lab->updated_at = Carbon::parse($lab->updated_at)->setTimezone('America/Mexico_City');

        return view('Admin.Labs.update_view', compact('data', 'lab'));
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

        return redirect('/admin/labs');
    }

    public function showLab($id){


        $data = $this->data;

        $lab = Lab::find($id);
        $computers = Computer::where('lab_id', $id)->get();

        return view('Admin.Labs.showlab', compact('data', 'lab','computers'));


    }
}
