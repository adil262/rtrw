<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalronda extends Model
{
    protected $table ='jadwalrondas';
    protected $primaryKey= 'id_jawalronda';
    protected $fillable = ['id_warga', 'id_ronda','status'];  
}

