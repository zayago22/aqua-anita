<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonio;
use Illuminate\Http\Request;

class TestimonioController extends Controller
{
    public function index()
    {
        $testimonios = Testimonio::orderBy('orden')->paginate(20);
        return view('admin.testimonios.index', compact('testimonios'));
    }

    public function create()
    {
        return view('admin.testimonios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'nullable|string|max:255',
            'texto' => 'required|string|max:5000',
            'estrellas' => 'required|integer|min:1|max:5',
            'activo' => 'nullable|boolean',
            'orden' => 'nullable|integer',
        ]);

        $validated['activo'] = $request->has('activo');
        $validated['orden'] = $validated['orden'] ?? 0;

        Testimonio::create($validated);

        return redirect()->route('admin.testimonios.index')->with('success', 'Testimonio creado correctamente.');
    }

    public function edit(Testimonio $testimonio)
    {
        return view('admin.testimonios.edit', compact('testimonio'));
    }

    public function update(Request $request, Testimonio $testimonio)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'nullable|string|max:255',
            'texto' => 'required|string|max:5000',
            'estrellas' => 'required|integer|min:1|max:5',
            'activo' => 'nullable|boolean',
            'orden' => 'nullable|integer',
        ]);

        $validated['activo'] = $request->has('activo');

        $testimonio->update($validated);

        return redirect()->route('admin.testimonios.index')->with('success', 'Testimonio actualizado correctamente.');
    }

    public function destroy(Testimonio $testimonio)
    {
        $testimonio->delete();
        return redirect()->route('admin.testimonios.index')->with('success', 'Testimonio eliminado correctamente.');
    }
}
