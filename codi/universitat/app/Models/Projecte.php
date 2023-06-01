<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecte extends Model
{
    use HasFactory;

    protected $table = 'projectes';
    protected $primaryKey = 'CodiProj';

    protected $fillable = [
        'CodiProj',
        'Nom',
        'DataInici',
        'Classificacio',
        'HoresAssignades',
        'PressupostAssignat',
        'MaxInvestigadorsAssignables',
        'Responsable',
        'Investigacio',
        'IdiomaTreball',
    ];

    public function investigadors()
    {
        return $this->belongsToMany(Investigador::class, 'participa', 'CodiProj', 'Passaport')
            ->withPivot('DataInici', 'DataFinal', 'Retribucio', 'ParticipacioProrrogable', 'ParticipacioPublicacio');
    }
}