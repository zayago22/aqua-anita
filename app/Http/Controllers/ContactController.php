<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoRecibido;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validar datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:15',
            'programa' => 'nullable|string|max:255',
            'mensaje' => 'required|string|min:10',
        ]);

        // Guardar en la base de datos
        try {
            $contacto = Contact::create($validated);

            // Enviar notificación por correo a hola@rekobit.com
            try {
                Mail::to('hola@rekobit.com')->send(new ContactoRecibido($contacto));
            } catch (\Exception $e) {
                Log::error('Error al enviar email de contacto: ' . $e->getMessage());
                // No falla el formulario si el email no se envía
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente. Nos pondremos en contacto pronto.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al enviar el mensaje. Por favor, intenta de nuevo.'
            ], 500);
        }
    }
}
