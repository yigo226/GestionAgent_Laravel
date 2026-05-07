<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Service;
use App\Models\Poste;

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

    /**
     * L'agent appartient à un seul poste.
     */
    public function postes(): BelongsTo
    {
        return $this->belongsTo(Poste::class);
    }

    protected $fillable = [
    'matricule',
    'nom',
    'prenom',
    'telephone',
    'email',
    'image',
    'service_id',
    'poste_id',
    'date_naissance',
    'sexe',
    'date_recrutement',
    'statut',
    'adresse',
    'photo',
    'created_at',
    'updated_at',
    ];

        protected static function booted()
    {
        static::creating(function ($agent) {
            // On vérifie si le matricule est vide avant d'en générer un
            if (empty($agent->matricule)) {
                $agent->matricule = 'AGT-' . strtoupper(uniqid()); // Exemple de logique
            }
        });
    }

}
