@extends('admin.layout')
@section('title', 'Nueva Clase')

@section('content')
<div class="top-bar">
    <h4><i class="fas fa-plus me-2" style="color: var(--green);"></i>Nueva Clase</h4>
    <a href="{{ route('admin.clases.index') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Volver</a>
</div>

<div class="card-admin p-4">
    <form action="{{ route('admin.clases.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label fw-bold" style="font-size: 13px;">Nombre de la Clase *</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Ej: Clases Grupales" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold" style="font-size: 13px;">Ícono (Font Awesome)</label>
                <input type="text" name="icono" class="form-control" value="{{ old('icono', 'fas fa-swimming-pool') }}" placeholder="fas fa-swimming-pool">
                <small class="text-muted">Ej: fas fa-users, fas fa-baby, fas fa-water</small>
            </div>
            <div class="col-12">
                <label class="form-label fw-bold" style="font-size: 13px;">Descripción</label>
                <textarea name="descripcion" rows="4" class="form-control" placeholder="Describe esta clase...">{{ old('descripcion') }}</textarea>
            </div>

            <div class="col-12">
                <hr>
                <h6 class="fw-bold mb-3"><i class="fas fa-image me-2" style="color: var(--green);"></i>Imagen Principal</h6>
                <input type="file" name="imagen_principal" class="form-control" accept="image/*" onchange="previewMain(this)">
                <small class="text-muted">Formatos: JPEG, PNG, JPG, WEBP. Máx: 5MB</small>
                <div id="mainPreview" class="mt-2"></div>
            </div>

            <div class="col-12">
                <hr>
                <h6 class="fw-bold mb-3"><i class="fas fa-images me-2" style="color: var(--green);"></i>Imágenes Adicionales (máx 5)</h6>
                <input type="file" name="imagenes[]" class="form-control" accept="image/*" multiple onchange="previewGallery(this)">
                <small class="text-muted">Puedes seleccionar hasta 5 imágenes a la vez.</small>
                <div id="galleryPreview" class="mt-2 d-flex gap-2 flex-wrap"></div>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold" style="font-size: 13px;">Orden</label>
                <input type="number" name="orden" class="form-control" value="{{ old('orden', 0) }}" min="0">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="activo" value="1" id="activo" {{ old('activo', true) ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="activo" style="font-size: 13px;">Activa (visible en la web)</label>
                </div>
            </div>
            <div class="col-12">
                <hr>
                <button type="submit" class="btn btn-green"><i class="fas fa-save me-2"></i>Guardar Clase</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function previewMain(input) {
    const preview = document.getElementById('mainPreview');
    preview.innerHTML = '';
    if (input.files[0]) {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(input.files[0]);
        img.style = 'height: 120px; border-radius: 8px; object-fit: cover;';
        preview.appendChild(img);
    }
}
function previewGallery(input) {
    const preview = document.getElementById('galleryPreview');
    preview.innerHTML = '';
    const files = Array.from(input.files).slice(0, 5);
    files.forEach(file => {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style = 'height: 80px; width: 80px; border-radius: 8px; object-fit: cover;';
        preview.appendChild(img);
    });
    if (input.files.length > 5) {
        const warn = document.createElement('span');
        warn.textContent = 'Solo se subirán las primeras 5 imágenes.';
        warn.style = 'color: #f59e0b; font-size: 12px; align-self: center;';
        preview.appendChild(warn);
    }
}
</script>
@endpush
