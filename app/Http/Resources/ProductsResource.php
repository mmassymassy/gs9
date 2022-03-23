<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'name' => $this->name,
            'brand' => $this->brand,
            'family' => $this->family,
            'model' => $this->model,
            'position' => $this->position,
            'unit' => $this->unit,
            'piecesInUnit' => $this->piecesInUnit,
            'gUnitPrice' => $this->gUnitPrice,
            'dUnitPrice' => $this->dUnitPrice,
            'gPiecePrice' => $this->gPiecePrice,
            'dPiecePrice' => $this->dPiecePrice,
            'initUnitQ' => $this->initUnitQ,
            'initPieceQ' => $this->initPieceQ,
            'quantityAlert' => $this->quantityAlert,
            'expDate' => $this->expDate,
        ];
    }
}
