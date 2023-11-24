<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risque extends Model
{
    protected $table = 'risques';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'cause', 'menaces','proprietaire','type','mesuressec','financier','image','confirmite','satisfaction'    ,'impacte','facilite','vraisemblance','indice','criticite','niveaucrit'];  
    use HasFactory;
}
