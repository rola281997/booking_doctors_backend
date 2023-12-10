<?php

namespace App\Transformers\Doctors;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "mobile" => $this->mobile,
            "photo"=>$this->photo,
        ];
    }
}
