<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiIuranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id_transaksi_iuran' => $this->id_transaksi_iuran,
            'id_warga' => $this->id_warga,
            'id_iuran' => $this->id_iuran,
            'tgl_iuran' => $this->tgl_iuran,
            'jumlah_iuran' => $this->jumlah_iuran,
            'bukti' => $this->bukti,
            'status' => $this->status,
            'metode_pembayaran' => $this->metode_pembayaran,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
