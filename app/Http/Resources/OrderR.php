<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderR extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = collect($this->resource)->except(['user_id', 'updated_at','order_discount_codes']);
        $data['status'] = $this->currentStatus;
        $data['status_text'] = $this->currentStatusText;
        $data['description'] = $this->products->map(function ($product) {
            return $product->name;
        })->implode(', ');
        return $data;
    }
}
