<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
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
            'id' => $this->id,
            'judul_berita' => $this->judul_berita,
            'deskripsi'=>$this->deskripsi,
            'foto'=>$this->foto,
            'tanggal'=>$this->tanggal,
            'created_at' => $this ->created_at,
            'updated_at' => $this ->update_at,
        ];
}
}
