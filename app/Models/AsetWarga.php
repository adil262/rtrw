<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetWarga extends Model
{
    use HasFactory;
    protected $fillable = ['nama_aset', 'jumlah', 'foto', 'status', 'id_peminjaman'];
}
