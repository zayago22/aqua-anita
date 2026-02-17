@extends('admin.layout')
@section('title', 'Nuevo Testimonio')

@section('content')
<div class="top-bar">
    <h4><i class="fas fa-plus me-2" style="color: var(--green);"></i>Nuevo Testimonio</h4>
    <a href="{{ route('admin.testimonios.index') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Volver</a>
</div>

<div class="card-admin p-4">
    <form action="{{ route('admin.testimonios.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold" style="font-size: 13px;">Nombre *</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Ej: María G." required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold" style="font-size: 13px;">Rol / Descripción</label>
                <input type="text" name="rol" class="form-control" value="{{ old('rol') }}" placeholder="Ej: Mamá de Sofía, 4 años">
            </div>
            <div class="col-12">
                <label class="form-label fw-bold" style="font-size: 13px;">Testimonio *</label>
                <textarea name="texto" rows="4" class="form-control" placeholder="Escribe el testimonio..." required>{{ old('texto') }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold" style="font-size: 13px;">Estrellas *</label>
                <select name="estrellas" class="form-select">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('estrellas', 5) == $i ? 'selected' : '' }}>{{ str_repeat('★', $i) }} ({{ $i }})</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold" style="font-size: 13px;">Orden</label>
                <input type="number" name="orden" class="form-control" value="{{ old('orden', 0) }}" min="0">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="activo" value="1" id="activo" {{ old('activo', true) ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="activo" style="font-size: 13px;">Activo (visible en la web)</label>
                </div>
            </div>
            <div class="col-12">
                <hr>
                <button type="submit" class="btn btn-green"><i class="fas fa-save me-2"></i>Guardar Testimonio</button>
            </div>
        </div>
    </form>
</div>
@endsection
