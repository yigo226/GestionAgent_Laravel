<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    /**
     * Un service possède plusieurs agents.
     */
    public function agents(): HasMany
    {
        return $this->hasMany(Agent::class);
    }
}
