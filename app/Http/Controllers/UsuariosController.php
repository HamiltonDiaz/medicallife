<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function cambiarContra(Request $request )
    {
        $input=$request->all();
        $id=$request->id;
        $users = User::all();
        $user = $users->find($id);
        Validator::make($input, [
            'current_password' => ['required', 'string','min:8'],
            'password' => ['required','min:8','confirmed'],
        ])->after(function ($validator) use ($user, $input) {
            if (!isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('La contraseña introducida no coincide con la registrada.'));
            }
        })->validate();

        User::whereId($user->id)->update([
            "password" => Hash::make($input['password']),
        ]);

        return back()->with('statusok',"Contraseña actualizada correctamente");
    }

    public function cambiarDatos(Request $request )
    {
         $messages=[
            'email.unique'=>"Este email ya se encuentra registrado.",
            'required'=>"Este campo es requerido",
        ];

        $this->validate(request(),[
            'nombre'=>['required'],
            'email'=>['required','unique:users,email,'.$request->id],
        ], $messages);
        //para poder dejar el mismo email pero que no se repita
        //tabla(unique:users),campo(email),id(.$request->id)
        $user= User::findOrFail($request->id);
        $user->name= $request->nombre;
        $user->email= $request->email;
        
        if ($request->telefono){
            $user->telefono= $request->telefono;
        }
        if ($request->dpto) {
            $user->dpto= $request->dpto;
        }
        if ($request->ciudad) {            
            $user->ciudad= $request->ciudad;
        }   
        $user->save();
        
        return back()->with('status',"Actualización exitosa");
    }


}
