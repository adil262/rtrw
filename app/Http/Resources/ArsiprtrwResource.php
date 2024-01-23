<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArsiprtrwResource extends JsonResource
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
            'id_arsip' => $this->id_arsip,
            'nama_arsip' => $this->nama_arsip,
            'deskripsi' => $this->deskripsi,
            'file_arsip' => $this->file_arsip,
            'id_rt_rw' => $this->id_rt_rw,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
