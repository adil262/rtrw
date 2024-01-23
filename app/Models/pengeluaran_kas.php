<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran_kas extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_pengeluaran', 'nama_pengeluaran', 'total_pengeluaran', 'bukti', 'keterangan'
    ];
}
