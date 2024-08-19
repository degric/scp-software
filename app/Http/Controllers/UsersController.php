<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lab;
use App\Models\Network;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // vistas 

    protected $data;

    public function __construct()
    {
        // Inicializar la propiedad $data
        $this->data = new \stdClass();
        $this->data->networks = Network::all();
        $this->data->labs = Lab::all();
    }


    public function users_view()
    {
        $users = User::all();
        $data = $this->data;
        $data->users = $users;

        return view('Admin.Users.users_view', compact('data'));
    }

    public function userCreate_view()
    {
        $data = $this->data;
        $labs = Lab::all();
        return view('Admin.Users.create_view', compact('data', 'labs'));
    }

    public function userUpdate_view($id)
    {

        $data = $this->data;
        $user = User::find($id);
        $user->created_at = Carbon::parse($user->created_at)->setTimezone('America/Mexico_City');
        $user->updated_at = Carbon::parse($user->updated_at)->setTimezone('America/Mexico_City');

        return view("Admin.Users.update_view", compact('user', 'data'));
    }



    // funcionalidad

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

        if ($request->tipo_usuario === 'enclab') {
            $user->labs()->sync($request->labs); 
        }

        return redirect('/admin/users');
    }

    public function updateUser(Request $request, $id)
    {

        $user = User::find($id);

        $password = null;
        if ($request->password) {
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

        $dataActualizar = array_filter($dataActualizar, fn($value) => !is_null($value));

        foreach ($dataActualizar as $field => $value) {
            $user->$field = $value;
        }

        $user->save();

        return redirect("/admin/users");
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect("/admin/users");
    }
}
