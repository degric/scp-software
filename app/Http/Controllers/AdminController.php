<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function admin()
    {
        return view('AdminController.home');
    }


    public function users_admins(Request $request)
    {

        $data = User::all();


        return view('AdminController.admins-view', compact('data'));
    }

    public function createUser(Request $request){
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
        return redirect('/admin/users/admins');
    }


    public function updateUserView(Request $request, $id){
        $data = User::find($id);
        $dateCreated = Carbon::parse($data->created_at)->setTimezone('America/Mexico_City');
        $dateUpdated = Carbon::parse($data->updated)->setTimezone('America/Mexico_City');

    

        return view('AdminController.update-view', compact('data', 'dateCreated', 'dateUpdated'));

    }

    public function updateUser(Request $request, $id){

        $user = User::find($id);
    
      
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
        
        return redirect('/admin/users/admins');
    }

    public function deleteUser($id){
        $user = User::find($id);

        $user->delete();

        return redirect('/admin/users/admins');
    }
}
