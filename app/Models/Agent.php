<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    /** @use HasFactory<\Database\Factories\AgentFactory> */
    use HasFactory;

     /**
     * L'agent appartient à un seul service.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    
}
