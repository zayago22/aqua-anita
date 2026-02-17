<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Testimonio;
use App\Models\Clase;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'contactos' => Contact::count(),
            'testimonios' => Testimonio::count(),
            'testimonios_activos' => Testimonio::where('activo', true)->count(),
            'clases' => Clase::count(),
            'clases_activas' => Clase::where('activo', true)->count(),
            'contactos_recientes' => Contact::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
