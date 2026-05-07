<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Service;
use App\Models\Agent;

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

    /**
     * Un poste peut avoir plusieurs agents.
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}
