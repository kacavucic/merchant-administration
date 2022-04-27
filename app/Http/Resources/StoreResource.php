<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    public static $wrap = 'store';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->resource->id,
            'display_name' => $this->resource->display_name,
            'address' => $this->resource->address,
            'phone_number' => $this->resource->phone_number,
            'email' => $this->resource->email,
            'merchant' => new MerchantResource($this->resource->merchant)
        ];
    }
}
