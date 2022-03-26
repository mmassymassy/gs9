<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopsResource extends JsonResource
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
            'shopDate' => $this->shopDate,
            'providerId' => $this->providerId,
            'productId' => $this->productId,
            'quantity' => $this->quantity,
            'totalPaid' => $this->totalPaid,
            'total' => $this->total,
            'info' => $this->info,
        ];
    }
}
