<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MerchantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'merchant';
    public function toArray($request)
    {
        return [
            'display_name' => $this->resource->display_name,
            'address' => $this->resource->address,
            'phone_number' => $this->resource->phone_number,
            'email' => $this->resource->email,
            'account_number' => $this->resource->account_number
        ];
    }
}
