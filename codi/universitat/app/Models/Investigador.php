<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;

    protected $table = 'investigadors';

    protected $primaryKey = 'Passaport';
    public $incrementing = false;

    protected $fillable = [
        'Passaport',
        'CodiAsseguranca',
        'NomCognoms',
        'Especialitat',
        'Telefon',
        'Adreca',
        'Ciutat',
        'Pais',
        'Email',
        'Titulacio',
    ];

    public function projectes()
    {
        return $this->belongsToMany(Projecte::class, 'participa', 'Passaport', 'CodiProj')
            ->withPivot('DataInici', 'DataFinal', 'Retribucio', 'ParticipacioProrrogable', 'ParticipacioPublicacio');
    }
}
