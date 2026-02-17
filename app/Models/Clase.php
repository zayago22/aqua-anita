<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clases';

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'imagen_principal',
        'icono',
        'activo',
        'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'orden' => 'integer',
    ];

    public function imagenes()
    {
        return $this->hasMany(ClaseImagen::class, 'clase_id')->orderBy('orden');
    }

    public function scopeActivas($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }
}
