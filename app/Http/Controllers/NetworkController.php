<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Network;
use App\Models\Lab;
use Carbon\Carbon;


class NetworkController extends Controller
{

    protected $data;
    public function __construct()
    {
        // Inicializar la propiedad $data
        $this->data = new \stdClass();
        $this->data->networks = Network::all();
        $this->data->labs = Lab::all();
    }






    public function showNetworksView()
    {
        $data = $this->data;


        return view("Admin.Networks.networks_view", compact('data'));
    }




    public function showCreateFormNetwork()
    {

        $data = $this->data;


        return view('Admin.Networks.create_view', compact('data'));
    }

    public function createNetwork(Request $request)
    {


        $network = Network::create([
            'nombre' => $request->nombre,
            'ip' => $request->ip,
            'mascara_red' => $request->mascara_red,
            'tipo_red' => $request->tipo_red
        ]);
        return redirect('/admin/networks');
    }

    public function deleteNetwork($id)
    {

        $network = Network::find($id);
        $network->delete();
        return redirect('/admin/networks');
    }

    public function showUpdateNetwork($id)
    {

        $data = $this->data;
        $network = Network::find($id);

        $network->created_at = Carbon::parse($network->created_at)->setTimezone('America/Mexico_City');
        $network->updated_at = Carbon::parse($network->updated_at)->setTimezone('America/Mexico_City');
        return view('Admin.Networks.update_view', compact('data', 'network'));
    }

    public function updateNetwork(Request $request, $id)
    {

        $network = Network::find($id);

    
        $dataActualizar = [
            'nombre' => $request->nombre,
            'ip' => $request->ip,
            'mascara_red' => $request->mascara_red,
            'tipo_red' => $request->tipo_red,
        ];

        $dataActualizar = array_filter($dataActualizar, fn($value) => !is_null($value));

        foreach ($dataActualizar as $field => $value) {
            $network->$field = $value;
        }

        $network->save();

        return redirect('/admin/networks'
        );
    }
}
