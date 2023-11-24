<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actif extends Model
{
    protected $table = 'actifs';
    protected $primaryKey = 'id';
    protected $fillable = ['description','proprietaire', 'type', 'processuse','c','i','d','selectionnee','commantaire'];  
    use HasFactory;
}
