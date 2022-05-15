<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
{
    public static $wrap = 'agent';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'phone_number' => $this->resource->phone_number,
            'email' => $this->resource->email,
            'gender' => $this->resource->gender,
            'age' => $this->resource->age,
            'store' => new StoreResource($this->resource->store)
        ];
    }
}
