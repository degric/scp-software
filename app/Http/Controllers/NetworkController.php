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


        return view("Admin.Networks.networks_view" , compact('data'));
    }




    public function showCreateFormNetwork()
    {
        return 'showCreateFormNetwork';
    }

    public function createNetwork(Request $request)
    {
        return 'createNetwork';
    }

    public function deleteNetwork($id)
    {
        return 'deleteNetwork';
    }

    public function showUpdateNetwork($id)
    {
        return 'showUpdateNetwork';
    }

    public function updateNetwork(Request $request, $id)
    {
        return 'updateNetwork';
    }
}
