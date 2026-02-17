@extends('admin.layout')
@section('title', 'Nuestras Clases')

@section('content')
<div class="top-bar">
    <h4><i class="fas fa-swimming-pool me-2" style="color: var(--green);"></i>Nuestras Clases</h4>
    <a href="{{ route('admin.clases.create') }}" class="btn btn-green btn-sm"><i class="fas fa-plus me-2"></i>Nueva Clase</a>
</div>

<div class="card-admin p-4">
    @if($clases->count())
    <div class="row g-4">
        @foreach($clases as $clase)
        <div class="col-md-4">
            <div class="card h-100" style="border-radius: 12px; overflow: hidden; border: 1px solid #e5e7eb;">
                @if($clase->imagen_principal)
                    <img src="{{ asset('storage/' . $clase->imagen_principal) }}" alt="{{ $clase->nombre }}" style="height: 180px; object-fit: cover;">
                @else
                    <div style="height: 180px; background: linear-gradient(135deg, var(--green-light) 0%, #e0f2fe 100%); display: flex; align-items: center; justify-content: center;">
                        <i class="{{ $clase->icono }}" style="font-size: 48px; color: var(--green); opacity: 0.5;"></i>
                    </div>
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 style="font-weight: 700; margin: 0;">{{ $clase->nombre }}</h6>
                        <span class="{{ $clase->activo ? 'badge-active' : 'badge-inactive' }}">
                            {{ $clase->activo ? 'Activa' : 'Inactiva' }}
                        </span>
                    </div>
                    <p style="font-size: 13px; color: #6b7280; margin-bottom: 8px;">{{ Str::limit($clase->descripcion, 100) }}</p>
                    <div style="font-size: 12px; color: #9ca3af;">
                        <i class="fas fa-images me-1"></i> {{ $clase->imagenes->count() }} imágenes adicionales
                        <span class="ms-2"><i class="fas fa-sort me-1"></i> Orden: {{ $clase->orden }}</span>
                    </div>
                </div>
                <div class="card-footer bg-white border-top d-flex gap-2">
                    <a href="{{ route('admin.clases.edit', $clase) }}" class="btn btn-sm btn-outline-primary flex-fill"><i class="fas fa-edit me-1"></i>Editar</a>
                    <form action="{{ route('admin.clases.destroy', $clase) }}" method="POST" onsubmit="return confirm('¿Eliminar esta clase y todas sus imágenes?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3">{{ $clases->links() }}</div>
    @else
    <div style="text-align: center; padding: 60px;">
        <i class="fas fa-swimming-pool" style="font-size: 48px; color: #e5e7eb; margin-bottom: 16px;"></i>
        <p style="color: #9ca3af; font-size: 14px; margin-bottom: 16px;">No hay clases creadas aún.</p>
        <a href="{{ route('admin.clases.create') }}" class="btn btn-green"><i class="fas fa-plus me-2"></i>Crear Primera Clase</a>
    </div>
    @endif
</div>
@endsection
