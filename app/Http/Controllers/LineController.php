<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Input;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $lines= DB::select("SELECT id, nombre, descripcion, img, active	FROM medicallife.lines  WHERE eliminado='0'");
        return view("lines.listLines", compact('lines'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lines.createLines');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Validar que sea una imagen
        $descrip="";
        if ($request->input('descrip')) {
            $descrip=$request->input('descrip');
        }
        $alertType="success";
        $msg="¡Creado exitosamente!\\n";

        if ($request->hasFile('imgpreview')) {
            $path = $request->file('imgpreview')->store('public/img');
            $nombreImg=$request->file('imgpreview')->hashName();
                  
        }else{
            $alertType="error";
            $msg="¡Error al crear el registro!\\n";
            $notification=array(
                'message' => $msg,
                'alert-type'=>$alertType
            );
            return redirect("admin/lines")->with($notification);
        }
        
        if ($request->input('name') && $request->input('active')) {
            $line = Line::create([
                'nombre' => $request->input('name'),
                'descripcion' => $descrip,
                'img' => $nombreImg,
                'active' => $request->input('active'),
                'eliminado'=>"0"
            ]);
            $line->save();
        }else{
            $alertType="error";
            $msg="¡Error al crear el registro!\\n";
            $notification=array(
                'message' => $msg,
                'alert-type'=>$alertType
            );
            return redirect("admin/lines")->with($notification);
        }
        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin/lines")->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function show(Line $line, $id)
    {
        //
        $p=DB::table('lines')->whereId($id)->first();
        
        dd($p);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function edit(Line $line,Request $request)
    {
        //dd($request);
        
        $descrip="";
        if ($request->input('descrip')) {
            $descrip=$request->input('descrip');
        }

        $alertType="success";
        $msg="Modificado exitosamente!\\n";

        if ($request->hasFile('imgpreview')) {
            Storage::disk('publicimg')->delete($request->input('imgold'));
            $path = $request->file('imgpreview')->store('public/img');
            $nombreImg=$request->file('imgpreview')->hashName();
        }else{
            $nombreImg=$request->input('imgold');
        }

        if ($request->input('active')) {
            $active=$request->input('active');
        }else{
            $active=$request->input('activeold');
        }

        if ($request->input('name') && $active && $nombreImg) {
            Line::whereId($request->input('id'))->update([
                'nombre' => $request->input('name'),
                'descripcion' => $descrip,
                'img' => $nombreImg,
                'active' => $active,
            ]);
        }else{
            $alertType="error";
            $msg="¡Error al modificar el registro!\\n";
            $notification=array(
                'message' => $msg,
                'alert-type'=>$alertType
            );
            return redirect("admin/lines")->with($notification);
        }
        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin/lines")->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Line $line)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function destroy(Line $line, $id)
    {
        $alertType="warning";
        $msg="¡Se ha ELminado!\\n";

        if ($id){
           Line::whereId($id)->update([
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
        return redirect("admin/lines")->with($notification);
    }
}
