<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi_Warga extends Model
{
    use HasFactory;

    protected $table = 'informasi_wargas';
    protected $fillable = ['id_warga', 'deskripsi', 'jenis', 'foto'];
}
