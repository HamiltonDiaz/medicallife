<?php

namespace App\Http\Controllers;

use App\Models\contactenos;
use App\Models\product;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ContactenosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lines= DB::select("SELECT id, nombre, descripcion, img, active	FROM medicallife.lines  WHERE eliminado='0'");
        return view("contact", compact('lines'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contactenos  $contactenos
     * @return \Illuminate\Http\Response
     */
    public function show(contactenos $contactenos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contactenos  $contactenos
     * @return \Illuminate\Http\Response
     */
    public function edit(contactenos $contactenos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contactenos  $contactenos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactenos $contactenos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactenos  $contactenos
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactenos $contactenos)
    {
        //
    }
}
