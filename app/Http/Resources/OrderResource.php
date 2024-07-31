<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $delivery_hours = $this->delivery_hours;

        // Если delivery_hours уже массив, не нужно его декодировать
        if (is_string($delivery_hours)) {
            $delivery_hours = json_decode($delivery_hours, true);
        }

        return [
            'id' => $this->id,
            'weight' => $this->weight,
            'region' => $this->region,
            'delivery_hours' => $delivery_hours,
        ];
    }
}
