@extends('admin.layout')
@section('title', 'Editar Clase')

@section('content')
<div class="top-bar">
    <h4><i class="fas fa-edit me-2" style="color: var(--green);"></i>Editar: {{ $clase->nombre }}</h4>
    <a href="{{ route('admin.clases.index') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Volver</a>
</div>

<div class="card-admin p-4">
    <form action="{{ route('admin.clases.update', $clase) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label fw-bold" style="font-size: 13px;">Nombre de la Clase *</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $clase->nombre) }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold" style="font-size: 13px;">Ícono (Font Awesome)</label>
                <input type="text" name="icono" class="form-control" value="{{ old('icono', $clase->icono) }}">
            </div>
            <div class="col-12">
                <label class="form-label fw-bold" style="font-size: 13px;">Descripción</label>
                <textarea name="descripcion" rows="4" class="form-control">{{ old('descripcion', $clase->descripcion) }}</textarea>
            </div>

            <!-- Current Main Image -->
            <div class="col-12">
                <hr>
                <h6 class="fw-bold mb-3"><i class="fas fa-image me-2" style="color: var(--green);"></i>Imagen Principal</h6>
                @if($clase->imagen_principal)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $clase->imagen_principal) }}" alt="" style="height: 150px; border-radius: 8px; object-fit: cover;">
                        <p style="font-size: 12px; color: #6b7280; margin-top: 4px;">Imagen actual. Sube una nueva para reemplazarla.</p>
                    </div>
                @endif
                <input type="file" name="imagen_principal" class="form-control" accept="image/*" onchange="previewMain(this)">
                <div id="mainPreview" class="mt-2"></div>
            </div>

            <!-- Current Gallery Images -->
            <div class="col-12">
                <hr>
                <h6 class="fw-bold mb-3"><i class="fas fa-images me-2" style="color: var(--green);"></i>Imágenes Adicionales ({{ $clase->imagenes->count() }}/5)</h6>
                @if($clase->imagenes->count())
                <div class="d-flex gap-3 flex-wrap mb-3">
                    @foreach($clase->imagenes as $img)
                    <div style="position: relative;">
                        <img src="{{ asset('storage/' . $img->imagen) }}" alt="" style="height: 100px; width: 100px; border-radius: 8px; object-fit: cover;">
                        <form action="{{ route('admin.clases.imagen.destroy', $img) }}" method="POST" style="position: absolute; top: -6px; right: -6px;" onsubmit="return confirm('¿Eliminar esta imagen?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="width: 24px; height: 24px; padding: 0; border-radius: 50%; font-size: 10px; line-height: 1;">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>
                @endif
                @if($clase->imagenes->count() < 5)
                <input type="file" name="imagenes[]" class="form-control" accept="image/*" multiple onchange="previewGallery(this)">
                <small class="text-muted">Puedes agregar {{ 5 - $clase->imagenes->count() }} imagen(es) más.</small>
                <div id="galleryPreview" class="mt-2 d-flex gap-2 flex-wrap"></div>
                @else
                <p style="font-size: 13px; color: #f59e0b;"><i class="fas fa-info-circle me-1"></i>Ya tienes 5 imágenes. Elimina alguna para agregar más.</p>
                @endif
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold" style="font-size: 13px;">Orden</label>
                <input type="number" name="orden" class="form-control" value="{{ old('orden', $clase->orden) }}" min="0">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="activo" value="1" id="activo" {{ old('activo', $clase->activo) ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="activo" style="font-size: 13px;">Activa (visible en la web)</label>
                </div>
            </div>
            <div class="col-12">
                <hr>
                <button type="submit" class="btn btn-green"><i class="fas fa-save me-2"></i>Actualizar Clase</button>
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
    const maxNew = {{ 5 - $clase->imagenes->count() }};
    const files = Array.from(input.files).slice(0, maxNew);
    files.forEach(file => {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style = 'height: 80px; width: 80px; border-radius: 8px; object-fit: cover;';
        preview.appendChild(img);
    });
}
</script>
@endpush
