<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RondaResource extends JsonResource
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
            'id_ronda' => $this -> id_ronda,
            'hari' => $this ->hari,
            'jam' =>$this ->jam,
            'nama_ronda' =>$this ->nama_ronda,
            'tanggal' =>$this ->tanggal,
            'status' =>$this ->status,
            'created_at' =>$this->created_at,
            'updated_at' =>$this->updated_at,
        ];
    }
}