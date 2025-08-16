<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyecto extends Model
{
    protected $fillable = [
        'nombre',
        'fechaInicio',
        'estado',
        'responsable',
        'monto',
        'created_by'
    ];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
