@extends('admin.layout')
@section('title', 'Contactos')

@section('content')
<div class="top-bar">
    <h4><i class="fas fa-envelope me-2" style="color: var(--green);"></i>Contactos Recibidos</h4>
    <span class="badge bg-secondary">{{ $contactos->total() }} total</span>
</div>

<div class="card-admin p-4">
    @if($contactos->count())
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Programa</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactos as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td style="font-weight: 600;">{{ $c->nombre }}</td>
                    <td><a href="mailto:{{ $c->email }}" style="color: var(--green);">{{ $c->email }}</a></td>
                    <td><a href="https://wa.me/52{{ preg_replace('/\D/', '', $c->telefono) }}" target="_blank" style="color: #25D366;"><i class="fab fa-whatsapp me-1"></i>{{ $c->telefono }}</a></td>
                    <td>{{ $c->programa ?? '—' }}</td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $c->mensaje }}</td>
                    <td style="color: #6b7280; white-space: nowrap;">{{ $c->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.contactos.destroy', $c) }}" method="POST" onsubmit="return confirm('¿Eliminar este contacto?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $contactos->links() }}</div>
    @else
    <p style="color: #9ca3af; font-size: 14px; text-align: center; padding: 40px;">No hay contactos recibidos aún.</p>
    @endif
</div>
@endsection
