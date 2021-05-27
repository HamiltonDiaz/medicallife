<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products=DB::table("products as pr")->select("pr.id", "pr.nombre", "pr.precio", "pr.referencia", "pr.descripcion", "pr.img", "pr.active", "ln.nombre AS linea", "ln.id AS id_line")
        ->leftJoin("lines as ln","pr.line_id","=","ln.id")
        ->where("pr.eliminado",0)->where("ln.eliminado",0)->get();

        $lines= Line::select("id", "nombre", "descripcion", "img", "active")->where("eliminado","=",0)->orderBy("nombre","asc")->get();        
        return view("products.listProducts", compact('lines','products'));
    }

    public function filtrarProductosNombre(Request $request){

        if ($request->findprod) {
            $nameProduct=$request->findprod;
            $products=DB::table("products as pr")
            ->select("*",
            DB::raw("(SELECT nombre FROM medical.lines where id=pr.line_id) as linea"))            
            ->where("pr.eliminado",0)            
            ->where("pr.nombre","LIKE","%$nameProduct%")
            ->orderBy("linea","asc")
            ->orderBy("pr.nombre","asc")->paginate(15);
        }else{
            $products=array();
        }
        
        $filtro=1;
        $lines= Line::select("id", "nombre", "descripcion", "img", "active")->where("eliminado","=",0)->orderBy("nombre","asc")->get();
        return view("products.listProductUser", compact('products', 'lines','filtro'));
    }


    public function filtrarProductos(Request $request){

        if ($request->linea){            
            $products=DB::table("products as pr")
            ->select("*",
            DB::raw("(SELECT nombre FROM medical.lines where id=pr.line_id) as linea")
            )
            ->whereIn("pr.line_id",$request->linea)
            ->where("pr.eliminado",0)
            ->orderBy("linea","asc")
            ->orderBy("pr.nombre","asc")
            ->paginate(15);
        }else{
            $products=array();
        }
                
        $filtro=1;
        $lines= Line::select("id", "nombre", "descripcion", "img", "active")->where("eliminado","=",0)->orderBy("nombre","asc")->get();
        return view("products.listProductUser", compact('products', 'lines','filtro'));
    }

    public function create()
    {
        $lines= Line::select("id", "nombre", "descripcion", "img", "active")->where("eliminado","=",0)->orderBy("nombre","asc")->get();
        return view('products.createProducts',compact('lines'));
    }

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
            return redirect("admin-medical/products")->with($notification);
        }
        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin-medical/products")->with($notification);
    }


    public function show($id)
    {
        $producto=product::where("id","=",$id)->get()->first();
        $lines= Line::where("eliminado=0");
        return view("products.productUser", compact('producto','lines'));
    }

    public function showGroup(product $product, $line)
    {
        $filtro=2;
        if ($line>0) {
            $filtro=0;
            $products=DB::table("products as pr")->select("pr.id", "pr.nombre", "pr.precio", "pr.referencia", "pr.descripcion", "pr.img", "ln.nombre AS linea", "ln.descripcion AS desclinea")
            ->leftJoin("lines as ln","pr.line_id","=","ln.id")
            ->where("pr.eliminado",0)->where("ln.eliminado",0)->where("pr.line_id",$line)->orderBy("ln.nombre","asc")->orderBy("pr.nombre","asc")->paginate(15);

        }else{
            $products=DB::table("products as pr")->select("pr.id", "pr.nombre", "pr.precio", "pr.referencia", "pr.descripcion", "pr.img", "ln.nombre AS linea")
            ->leftJoin("lines as ln","pr.line_id","=","ln.id")
            ->where("pr.eliminado",0)->where("ln.eliminado",0)->orderBy("ln.nombre","asc")->orderBy("pr.nombre","asc")->paginate(15);
        }
        $lines= Line::select("id", "nombre", "descripcion", "img", "active")->where("eliminado","=",0)->orderBy("nombre","asc")->get();
        $lineid=$line;
        return view("products.listProductUser", compact('products', 'lines', 'filtro','lineid'));
    }

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
            return redirect("admin-medical/products")->with($notification);
        }
        $notification=array(
            'message' => $msg,
            'alert-type'=>$alertType
        );
        return redirect("admin-medical/products")->with($notification);
    }

    public function update(Request $request, product $product)
    {
        
    }

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
        return redirect("admin-medical/products")->with($notification);
    }
}
