<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AsetWargaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_aset' => $this->nama_aset,
            'jumlah' => $this->jumlah,
            'foto' => $this->foto,
            'status' => $this->status,
            'id_peminjaman' => $this->id_peminjaman,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
