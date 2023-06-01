<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participa extends Model
{
    use HasFactory;
    
    protected $table = 'participa';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    
    protected $fillable = [
        'Passaport',
        'CodiProj',
        'DataInici',
        'DataFinal',
        'Retribucio',
        'ParticipacioProrrogable',
        'ParticipacioPublicacio',
    ];

    public function projecte()
    {
        return $this->belongsTo(Projecte::class, 'CodiProj', 'CodiProj');
    }

    public function investigador()
    {
        return $this->belongsTo(Investigador::class, 'Passaport', 'Passaport');
    }
}
