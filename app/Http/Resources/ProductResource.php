<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'SKU' => $this->SKU,
            'name' => $this->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'sp' => $this->sp,
            'description' => $this->description,
            'feature' =>  $this->feature ,
            'unit' =>  $this->unit->name ,
            
        ];
    }
}
