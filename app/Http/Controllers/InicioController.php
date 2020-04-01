<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()); // muestro los datos del usuario

        // dd(auth()->user()->nombre);

        // dd(session()->all()); // muestro el contenido de session

        return view('inicio');
        
    }

    
}
