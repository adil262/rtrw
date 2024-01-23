<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_posyandu';
    protected $table = 'posyandus';
    protected $fillable = [
        'lokasi', 'lat', 'long', 'deskripsi', 'foto'
    ]; 
}
