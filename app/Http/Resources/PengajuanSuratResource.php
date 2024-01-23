<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PengajuanSuratResource extends JsonResource
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
            'id_warga' => $this->id_warga,
            'keperluan' => $this->keperluan,
            'jenis' => $this->jenis,
            'dibuat_untuk' => $this->dibuat_untuk,
            'status' => $this->status,
            'tgl_keperluan' => $this->tgl_keperluan,
            'keterangan' => $this->keterangan,
        ];
    }
}
