<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SarankelResource extends JsonResource
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
            'id_sarankel' => $this->id_sarankel,
            'id_warga' => $this->id_warga,
            'keluhan' => $this->keluhan,
            'foto' => $this->foto,
            'status' => $this->status,
            'tanggal_create' => $this->tanggal_create,
            'tanggal_finish' => $this->tanggal_finish
        ];
    }
}
