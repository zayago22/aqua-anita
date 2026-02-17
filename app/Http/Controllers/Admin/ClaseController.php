<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clase;
use App\Models\ClaseImagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClaseController extends Controller
{
    public function index()
    {
        $clases = Clase::with('imagenes')->orderBy('orden')->paginate(20);
        return view('admin.clases.index', compact('clases'));
    }

    public function create()
    {
        return view('admin.clases.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:10000',
            'icono' => ['nullable', 'string', 'max:100', 'regex:/^[a-z0-9\s\-]+$/i'],
            'activo' => 'nullable|boolean',
            'orden' => 'nullable|integer',
            'imagen_principal' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'imagenes.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $validated['activo'] = $request->has('activo');
        $validated['orden'] = $validated['orden'] ?? 0;
        $validated['icono'] = $validated['icono'] ?? 'fas fa-swimming-pool';

        // Generate unique slug
        $slug = Str::slug($validated['nombre']);
        $original = $slug;
        $counter = 2;
        while (Clase::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $counter++;
        }
        $validated['slug'] = $slug;

        // Handle main image
        if ($request->hasFile('imagen_principal')) {
            $validated['imagen_principal'] = $request->file('imagen_principal')->store('clases', 'public');
        }

        $clase = Clase::create($validated);

        // Handle additional images (up to 5)
        if ($request->hasFile('imagenes')) {
            $orden = 1;
            foreach (array_slice($request->file('imagenes'), 0, 5) as $img) {
                $path = $img->store('clases/galeria', 'public');
                ClaseImagen::create([
                    'clase_id' => $clase->id,
                    'imagen' => $path,
                    'orden' => $orden++,
                ]);
            }
        }

        return redirect()->route('admin.clases.index')->with('success', 'Clase creada correctamente.');
    }

    public function edit(Clase $clase)
    {
        $clase->load('imagenes');
        return view('admin.clases.edit', compact('clase'));
    }

    public function update(Request $request, Clase $clase)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:10000',
            'icono' => ['nullable', 'string', 'max:100', 'regex:/^[a-z0-9\s\-]+$/i'],
            'activo' => 'nullable|boolean',
            'orden' => 'nullable|integer',
            'imagen_principal' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'imagenes.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $validated['activo'] = $request->has('activo');

        // Generate unique slug (excluding current record)
        $slug = Str::slug($validated['nombre']);
        $original = $slug;
        $counter = 2;
        while (Clase::where('slug', $slug)->where('id', '!=', $clase->id)->exists()) {
            $slug = $original . '-' . $counter++;
        }
        $validated['slug'] = $slug;

        // Handle main image
        if ($request->hasFile('imagen_principal')) {
            // Delete old image
            if ($clase->imagen_principal) {
                Storage::disk('public')->delete($clase->imagen_principal);
            }
            $validated['imagen_principal'] = $request->file('imagen_principal')->store('clases', 'public');
        }

        $clase->update($validated);

        // Handle additional images
        if ($request->hasFile('imagenes')) {
            $currentCount = $clase->imagenes()->count();
            $maxNew = 5 - $currentCount;
            if ($maxNew > 0) {
                $orden = $currentCount + 1;
                foreach (array_slice($request->file('imagenes'), 0, $maxNew) as $img) {
                    $path = $img->store('clases/galeria', 'public');
                    ClaseImagen::create([
                        'clase_id' => $clase->id,
                        'imagen' => $path,
                        'orden' => $orden++,
                    ]);
                }
            }
        }

        return redirect()->route('admin.clases.index')->with('success', 'Clase actualizada correctamente.');
    }

    public function destroy(Clase $clase)
    {
        // Delete images from storage
        if ($clase->imagen_principal) {
            Storage::disk('public')->delete($clase->imagen_principal);
        }
        foreach ($clase->imagenes as $img) {
            Storage::disk('public')->delete($img->imagen);
        }

        $clase->delete();
        return redirect()->route('admin.clases.index')->with('success', 'Clase eliminada correctamente.');
    }

    public function destroyImagen(ClaseImagen $imagen)
    {
        Storage::disk('public')->delete($imagen->imagen);
        $imagen->delete();
        return back()->with('success', 'Imagen eliminada correctamente.');
    }
}
