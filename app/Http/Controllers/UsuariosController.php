<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\CrapIndex;

class UsuariosController extends Controller
{
    public function index(){
        $users= User::all()->where("eliminado","=",0);        
        return view("users.listUser", compact('users'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $alertType="success";
        $msg="Creado exitosamente!\\n";

        $telefono="SIN TELEFONO";
        if ($request->input('telefono')) {
            $telefono=$request->input('telefono');
        }

        $ciudad="SIN CIUDAD";
        if ($request->input('ciudad')) {
            $ciudad=$request->input('ciudad');
        }

        $dpto="SIN DEPARTAMENTO";
        if ($request->input('dpto')) {
            $dpto=$request->input('dpto');
        }

     
        $email=$request->input('email');
        $emaildb= User::where("email","=", $email)->get()->first();
 

        if ($request->input('name') && $request->input('email') && $request->input('pass') && !$emaildb) {
            $user= User::create([
                'name' => $request->input('name'),
                'email' =>$email,
                'telefono' => $telefono,
                'ciudad' => $ciudad,
                'dpto' => $dpto,
                'password' => Hash::make($request->input('pass')),
                'eliminado'=>0,
            ]);
            $user->save();
        }else{
            $alertType="error";
            $msg="¡Error al crear el registro!\\n";
            if ($emaildb) {
                $msg=$msg . "Email duplicado";
            }
            $notification=array(
                'message' => $msg,
                'alert-type'=>$alertType
            );
            return redirect("admin-medical/users-admin")->with($notification);
        }
        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin-medical/users-admin")->with($notification);
    }

    public function edit(Request $request)
    {
        $alertType="success";
        $msg="Modificado exitosamente!\\n";

        $email=$request->input('email');
        $emaildb= User::where("email","=", $email)->where("id","!=",$request->input('id'))->get()->first();


        if ($request->input('id') && !$emaildb) {
            $datosActuales=User::whereId($request->input('id'))->get()->first();
            
            $name=$datosActuales->name;
            if ($request->input('name')) {
                $name=$request->input('name');
            }

            $telefono=$datosActuales->telefono;
            if ($request->input('telefono')) {
                $telefono=$request->input('telefono');
            }

             $ciudad=$datosActuales->ciudad;
            if ($request->input('ciudad')) {
                $ciudad=$request->input('ciudad');
            }
         
            $dpto=$datosActuales->dpto;
            if ($request->input('dpto')) {
                $dpto=$request->input('dpto');
            }     
    
            if ($request->input('pass')) {
                User::whereId($request->input('id'))->update([
                   'password' => Hash::make($request->input('pass')),
                ]);
            }            

            User::whereId($request->input('id'))->update([
                'name' => $name,
                'email' =>$email,
                'telefono' => $telefono,
                'ciudad' => $ciudad,
                'dpto' => $dpto,                
                'eliminado'=>0,
            ]);
            
            
        }else{
            $alertType="error";
            $msg="¡Error al modificar el registro!\\n";
            if ($emaildb) {
                $msg=$msg . "Email duplicado";
            }
            $notification=array(
                'message' => $msg,
                'alert-type'=>$alertType
            );
            return redirect("admin-medical/users-admin")->with($notification);
        }
        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin-medical/users-admin")->with($notification);
    }
    
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

    public function destroy($id)
    {
        $alertType="warning";
        $msg="¡Se ha ELminado!\\n";

        if ($id){
           User::whereId($id)->update([
                'eliminado' => "1",
            ]);
        }else{
            $alertType="error";
            $msg="¡No se pudo eliminar!\\n";
        }

        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin-medical/users-admin")->with($notification);
    }



}
