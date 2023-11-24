<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ptr extends Model
{

    protected $table = 'ptrs';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'traitement', 'mesureiso','action','responsable',
'etat','efficacite','commentaire','impact','faclite','vraisemblance','criticiter','niveaucriticiter']; 


    use HasFactory;
}
