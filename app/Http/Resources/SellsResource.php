<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellsResource extends JsonResource
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
            'bonId' => $this->bonId,
            'clientId' => $this->clientId,
            'productId' => $this->productId,
            'unitQuantity' => $this->unitQuantity,
            'pieceQuantity' => $this->pieceQuantity,
            'price' => $this->price,
            'totalSell' => $this->totalSell,
            'totalPaid' => $this->totalPaid,
            'info' => $this->info
        ];
    }
}
