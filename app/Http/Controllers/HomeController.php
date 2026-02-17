<?php

namespace App\Http\Controllers;

use App\Models\Testimonio;
use App\Models\Clase;

class HomeController extends Controller
{
    public function index()
    {
        $testimonios = Testimonio::activos()->get();
        $clases = Clase::activas()->with('imagenes')->get();

        return view('home', compact('testimonios', 'clases'));
    }
}
