<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderssResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'info' => $this->info,
            'debtAlert' => $this->debtAlert,
            'totalPaid' => $this->totalPaid,
            'totalUnpaid' => $this->totalUnpaid,
        ];
    }
}
