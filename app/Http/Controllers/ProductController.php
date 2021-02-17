<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta="SELECT  pr.id, pr.nombre, pr.precio, pr.referencia, pr.descripcion, pr.img, pr.active, ln.nombre AS linea, ln.id AS id_line
        FROM medicallife.products pr\n
        LEFT JOIN medicallife.lines LN ON ln.id = pr.line_id\n
        WHERE pr.eliminado='0' AND ln.eliminado='0'";
        $products=DB::select($consulta) ;
        $lines= DB::select("SELECT id, nombre, descripcion, img, active	FROM medicallife.lines  WHERE eliminado='0'");
        return view("products.listProducts", compact('lines','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lines= DB::select("SELECT id, nombre, descripcion, img, active	FROM medicallife.lines  WHERE eliminado='0'");
        return view('products.createProducts',compact('lines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $alertType="success";
        $msg="Creado exitosamente!\\n";

        if ($request->hasFile('imgpreview')) {
            $path = $request->file('imgpreview')->store('public/img');
            $nombreImg=$request->file('imgpreview')->hashName();
        }

        $precio="";
        if ($request->input('precio')) {
            $precio=$request->input('precio');
        }

        $descrip="";
        if ($request->input('descrip')) {
            $descrip=$request->input('descrip');
        }


        if ($request->input('name') && $request->input('linea')  && $request->input('active')  && $request->input('referencia') ) {
            $product= product::create([
                'nombre' => $request->input('name'),
                'precio' => $precio,
                'referencia' => $request->input('referencia'),
                'descripcion' => $descrip,
                'img' => $nombreImg,
                'active' => $request->input('active') ,
                'eliminado'=>"0",
                'line_id'=> $request->input('linea'),
            ]);
            $product->save();
        }else{
            $alertType="error";
            $msg="¡Error al crear el registro!\\n";
            $notification=array(
                'message' => $msg,
                'alert-type'=>$alertType
            );
            return redirect("admin/products")->with($notification);
        }
        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin/products")->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product, $id)
    {
        $producto=DB::table('products')->whereId($id)->first();
        //dd($producto);
        $lines= DB::select("SELECT id, nombre, descripcion, img, active FROM medicallife.lines  WHERE eliminado='0'");
        return view("products.productUser", compact('producto','lines'));
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function showGroup(product $product, $line)
    {

        $consulta="SELECT  pr.id, pr.nombre, pr.precio, pr.referencia, pr.descripcion, pr.img, ln.nombre AS linea
        FROM medicallife.products pr\n
        LEFT JOIN medicallife.lines LN ON ln.id = pr.line_id\n
        WHERE pr.eliminado='0' AND pr.ACTIVE='on' ";

        
        if ($line>0) {
            $consulta= $consulta . " AND line_id=$line";
        }
        $lines= DB::select("SELECT id, nombre, descripcion, img, active	FROM medicallife.lines  WHERE eliminado='0'");
        $products= DB::select($consulta);
        
        return view("products.listProductUser", compact('products', 'lines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product, Request $request)
    {

        $alertType="success";
        $msg="Modificado exitosamente!\\n";

        if ($request->hasFile('imgpreview')) {
            Storage::disk('publicimg')->delete($request->input('imgold'));
            $path = $request->file('imgpreview')->store('public/img');
            $nombreImg=$request->file('imgpreview')->hashName();
        }else{
            $nombreImg=$request->input('imgold');
        }

        $active=$request->input('activeold');
        if ($request->input('active')) {
            $active=$request->input('active');
        }

        $precio="";
        if ($request->input('precio')) {
            $precio=$request->input('precio');
        }

        $descrip="";
        if ($request->input('descrip')) {
            $descrip=$request->input('descrip');
        }


        if ($request->input('name') && $request->input('linea')  && $request->input('id') && $request->input('referencia') ) {
            product::whereId($request->input('id'))->update([
                'nombre' => $request->input('name'),
                'precio' => $precio,
                'referencia' => $request->input('referencia'),
                'descripcion' => $descrip,
                'img' => $nombreImg,
                'active' => $active,
                'eliminado'=>"0",
                'line_id'=> $request->input('linea'),
            ]);
        }else{
            $alertType="error";
            $msg="¡Error al modificar el registro!\\n";
            $notification=array(
                'message' => $msg,
                'alert-type'=>$alertType
            );
            return redirect("admin/products")->with($notification);
        }
        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin/products")->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product, $id)
    {
        $alertType="warning";
        $msg="¡Se ha ELminado!\\n";

        if ($id){
           product::whereId($id)->update([
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
        return redirect("admin/products")->with($notification);
    }
}
