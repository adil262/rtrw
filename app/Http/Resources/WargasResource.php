<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WargasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return  [
            'level' => $this->level,
            'nama' => $this->nama,
            'password' => $this->password,
            'nik' => $this->nik,
            'tanggal_lahir' => $this->tanggal_lahir,
            'status' => $this->status,
            'kelurahan' => $this->kelurahan,
            'foto' => $this->foto,
            'jenis_kelamin' => $this->jenis_kelamin,
            'role' => $this->role,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
        ];
    }
}
