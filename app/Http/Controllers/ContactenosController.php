<?php

namespace App\Http\Controllers;

use App\Models\contactenos;
use App\Models\product;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactenosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lines= Line::select("id", "nombre", "descripcion", "img", "active")->where("eliminado","=",0)->get();
        //$lines= DB::select("SELECT id, nombre, descripcion, img, active FROM medical.lines  WHERE eliminado='0'");
        return view("contact", compact('lines'));
        
    }

    public function send(Request $request)
    {
        $asunto = "Contáctenos WebSite";
        $para=env('MAIL_USERNAME');
        $copia = $request->email;
        Mail::send('emails.contactenos',$request->all(), function($msj) use($asunto,$para,$copia){
            $msj->subject($asunto);
            $msj->to($para);
            $msj->cc($copia);
        });

    }
}
