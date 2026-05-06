<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    /** @use HasFactory<\Database\Factories\PosteFactory> */
    use HasFactory;

    /**
     * Un poste appartient à un seul service.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
