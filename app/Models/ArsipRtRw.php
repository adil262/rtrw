<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipRtRw extends Model
{
    use HasFactory;
    protected $table ='arsiprtrw';
    protected $fillable = ['id_arspip', 'nama_arsip', 'deskripsi', 'id_rt_rw', 'file_arsip'];
}