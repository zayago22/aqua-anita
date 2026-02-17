<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    protected $table = 'testimonios';

    protected $fillable = [
        'nombre',
        'rol',
        'texto',
        'estrellas',
        'activo',
        'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'estrellas' => 'integer',
        'orden' => 'integer',
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }
}
