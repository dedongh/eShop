<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'=> 'product',
            'id'=> $this->id,
            'name'=>$this->name,
            'description'=>$this->details,
            'quantity'=>$this->quantity,
            'image'=>$this->image
        ];
    }
}
