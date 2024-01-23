<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wargas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_warga';
    protected $fillable = [
        'level', 'nama', 'password', 'nik', 'tanggal_lahir', 'status', 'kelurahan', 'foto', 'jenis_kelamin', 'role', 'agama', 'pekerjaan'
    ];
}
