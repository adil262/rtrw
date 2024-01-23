<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsahaWarga extends Model
{
    protected $fillable = [
       'id_warga', 'judul', 'deskripsi', 'foto', 'no_hp_usaha', 'status'];

    use HasFactory;
}
