<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class datatamuResource extends JsonResource
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
    'nik' => $this->nik,
    'nama' => $this->nama,
    'alamat' => $this->alamat,
    'jk' => $this->jk,
    'tanggal_lahir' => $this->tanggal_lahir,
    'tanggal_masuk' => $this->tanggal_masuk,
    'tanggal_keluar' => $this->tanggal_keluar,
    'keperluan' => $this->keperluan,
    'bukti' => $this->bukti,
    'created_at' => $this->crated_at,
    'updated_at' => $this->updated_at

];
    }
}
