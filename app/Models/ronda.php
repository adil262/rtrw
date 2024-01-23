<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ronda extends Model
{
    protected $table ='rondas';
    protected $primaryKey= 'id_ronda';
    protected $fillable = ['hari', 'jam','nama_ronda','tanggal','status'];
}