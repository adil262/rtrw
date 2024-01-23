<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_Surat extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surats';
    protected $fillable = ['id_warga', 'keperluan', 'jenis', 'dibuat_untuk', 'status', 'tgl_keperluan', 'keterangan'];
}
