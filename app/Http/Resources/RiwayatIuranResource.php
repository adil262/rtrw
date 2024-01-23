<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RiwayatIuranResource extends JsonResource
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
            'id_iuran' => $this->id_iuran,
            'nama_iuran' => $this->nama_iuran,
            'periode' => $this->periode,
            'jumlah' => $this->jumlah,
            'status_jumlah' => $this->status_jumlah,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
