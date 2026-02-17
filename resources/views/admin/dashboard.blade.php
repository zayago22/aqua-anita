@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
<div class="top-bar">
    <h4><i class="fas fa-home me-2" style="color: var(--green);"></i>Dashboard</h4>
    <span style="font-size: 13px; color: #6b7280;">{{ now()->format('d/m/Y H:i') }}</span>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card-admin p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p style="font-size: 12px; color: #6b7280; margin: 0; text-transform: uppercase; letter-spacing: 0.5px;">Contactos</p>
                    <h3 style="font-weight: 800; margin: 4px 0 0;">{{ $stats['contactos'] }}</h3>
                </div>
                <div style="width: 48px; height: 48px; background: #eff6ff; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-envelope" style="color: #2563eb; font-size: 20px;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-admin p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p style="font-size: 12px; color: #6b7280; margin: 0; text-transform: uppercase; letter-spacing: 0.5px;">Testimonios</p>
                    <h3 style="font-weight: 800; margin: 4px 0 0;">{{ $stats['testimonios_activos'] }}<span style="font-size: 14px; color: #9ca3af;"> / {{ $stats['testimonios'] }}</span></h3>
                </div>
                <div style="width: 48px; height: 48px; background: #fef3c7; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-star" style="color: #f59e0b; font-size: 20px;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-admin p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p style="font-size: 12px; color: #6b7280; margin: 0; text-transform: uppercase; letter-spacing: 0.5px;">Clases</p>
                    <h3 style="font-weight: 800; margin: 4px 0 0;">{{ $stats['clases_activas'] }}<span style="font-size: 14px; color: #9ca3af;"> / {{ $stats['clases'] }}</span></h3>
                </div>
                <div style="width: 48px; height: 48px; background: var(--green-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-swimming-pool" style="color: var(--green); font-size: 20px;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-admin p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p style="font-size: 12px; color: #6b7280; margin: 0; text-transform: uppercase; letter-spacing: 0.5px;">Accesos Rápidos</p>
                    <div class="mt-2 d-flex gap-2">
                        <a href="{{ route('admin.testimonios.create') }}" class="btn btn-sm btn-green"><i class="fas fa-plus me-1"></i>Testimonio</a>
                        <a href="{{ route('admin.clases.create') }}" class="btn btn-sm btn-green"><i class="fas fa-plus me-1"></i>Clase</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Contacts -->
<div class="card-admin p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 style="font-weight: 700; margin: 0; font-size: 16px;">Contactos Recientes</h5>
        <a href="{{ route('admin.contactos.index') }}" style="font-size: 13px; color: var(--green); text-decoration: none; font-weight: 600;">Ver todos →</a>
    </div>
    @if($stats['contactos_recientes']->count())
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Programa</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats['contactos_recientes'] as $c)
                <tr>
                    <td style="font-weight: 600;">{{ $c->nombre }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->telefono }}</td>
                    <td>{{ $c->programa ?? '—' }}</td>
                    <td style="color: #6b7280;">{{ $c->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p style="color: #9ca3af; font-size: 14px; text-align: center; padding: 20px;">No hay contactos aún.</p>
    @endif
</div>
@endsection
