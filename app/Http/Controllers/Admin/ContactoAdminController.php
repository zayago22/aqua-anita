<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactoAdminController extends Controller
{
    public function index()
    {
        $contactos = Contact::latest()->paginate(20);
        return view('admin.contactos.index', compact('contactos'));
    }

    public function show(Contact $contacto)
    {
        return view('admin.contactos.show', compact('contacto'));
    }

    public function destroy(Contact $contacto)
    {
        $contacto->delete();
        return redirect()->route('admin.contactos.index')->with('success', 'Contacto eliminado correctamente.');
    }
}
