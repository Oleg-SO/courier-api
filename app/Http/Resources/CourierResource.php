<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // app/Http/Resources/CourierResource.php
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'courier_type' => $this->courier_type,
            'regions' => json_decode($this->regions),
            'working_hours' => json_decode($this->working_hours),
        ];
    }

}
