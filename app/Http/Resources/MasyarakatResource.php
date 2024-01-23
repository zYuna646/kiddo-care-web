<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MasyarakatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'jenis_kelamin' => $this->jenis_kelamin,
                'nik' => $this->nik,
                'nkk' => $this->nkk,
                'user_id'=> $this->user_id,
                'puskesmas_id' => $this->puskesmas_id
            ];
    }
}
