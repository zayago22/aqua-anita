@extends('admin.layout')
@section('title', 'Testimonios')

@section('content')
<div class="top-bar">
    <h4><i class="fas fa-star me-2" style="color: var(--green);"></i>Testimonios</h4>
    <a href="{{ route('admin.testimonios.create') }}" class="btn btn-green btn-sm"><i class="fas fa-plus me-2"></i>Nuevo Testimonio</a>
</div>

<div class="card-admin p-4">
    @if($testimonios->count())
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Testimonio</th>
                    <th>Estrellas</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonios as $t)
                <tr>
                    <td style="font-weight: 700;">{{ $t->orden }}</td>
                    <td style="font-weight: 600;">{{ $t->nombre }}</td>
                    <td style="color: #6b7280;">{{ $t->rol ?? '—' }}</td>
                    <td style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $t->texto }}</td>
                    <td style="color: #fbbf24;">{{ str_repeat('★', $t->estrellas) }}{{ str_repeat('☆', 5 - $t->estrellas) }}</td>
                    <td>
                        <span class="{{ $t->activo ? 'badge-active' : 'badge-inactive' }}">
                            {{ $t->activo ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.testimonios.edit', $t) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.testimonios.destroy', $t) }}" method="POST" onsubmit="return confirm('¿Eliminar este testimonio?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $testimonios->links() }}</div>
    @else
    <div style="text-align: center; padding: 60px;">
        <i class="fas fa-star" style="font-size: 48px; color: #e5e7eb; margin-bottom: 16px;"></i>
        <p style="color: #9ca3af; font-size: 14px; margin-bottom: 16px;">No hay testimonios aún.</p>
        <a href="{{ route('admin.testimonios.create') }}" class="btn btn-green"><i class="fas fa-plus me-2"></i>Crear Primer Testimonio</a>
    </div>
    @endif
</div>
@endsection
