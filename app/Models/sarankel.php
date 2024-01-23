<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarankel extends Model
{
    use HasFactory;
    protected $table = 'sarankels';
    protected $primaryKey = 'id_sarankel';
    protected $fillable =['id_warga', 'keluhan', 'foto', 'status', 'tanggal_create', 'tanggal_finish'];
}
