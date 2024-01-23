<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datatamu extends Model
{
    use HasFactory;
    protected $fillable = [ 'nik', 'nama', 'alamat','jk','tanggal_lahir','tanggal_masuk','tanggal_keluar','keperluan','bukti'];

}
