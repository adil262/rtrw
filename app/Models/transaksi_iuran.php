<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_iuran extends Model
{
    protected $primaryKey = "id_transaksi_iuran";
    protected $fillable = ([
        'id_warga','id_iuran','tgl_iuran','bukti','status','metode_pembayaran'
    ]);

    // public function Riwayat_iuran()
    // {
    //     return $this->hasOne('App\Riwayat_iuran');
    // }
}
