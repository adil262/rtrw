<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_iuran extends Model
{
    protected $primaryKey = 'id_iuran';
    protected $fillable =([
        'nama_iuran','periode','jumlah','status_jumlah'
    ]);

    // public function Transaksi_iuran()
    // {
    //     return $this->belongsTo('App\Transaksi_iuran');
    // }
}
