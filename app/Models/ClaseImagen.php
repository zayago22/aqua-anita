<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClaseImagen extends Model
{
    protected $table = 'clase_imagenes';

    protected $fillable = [
        'clase_id',
        'imagen',
        'orden',
    ];

    protected $casts = [
        'orden' => 'integer',
    ];

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clase_id');
    }
}
