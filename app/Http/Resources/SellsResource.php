<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Clients;
use App\Models\Products;

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
            'id' => $this->id,
            'bonId' => $this->bonId,
            'client' => Clients::find($this->clientId)->name,
            'product' => Products::find($this->productId)->name,
            'unitQuantity' => $this->unitQuantity,
            'pieceQuantity' => $this->pieceQuantity,
            'dsellPrice' => $this->dsellPrice,
            'gsellPrice' => $this->gsellPrice,
            'totalSell' => $this->totalSell,
            'totalPaid' => $this->totalPaid,
            'info' => $this->info,
            'mode' => $this->mode,
            'sellDate' => $this->created_at,
        ];
    }
}
