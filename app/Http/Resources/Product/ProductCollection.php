<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Review\ReviewResource;
use App\Model\Review;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /*return [
            'type' => 'product',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->details,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'rating' => $this->reviews->count() > 0 ?
                    round($this->reviews->sum('rating') / $this->reviews->count()) : 0,
                'image' => $this->image,
            ],
            'relationships' => [
                'product'=> route('products.show', $this->id),
                'user'=>[
                    'data'=>[
                        'type'=>'user',
                        'id'=>$this->user_id
                    ]
                ]
                //'reviews' => route('reviews.index', $this->id)
            ]
        ];*/

        return [
            'data' => ProductResource::collection($this->collection),
        ];
    }
    public function with($request)
    {
        $reviews = $this->collection->flatMap(
            function ($review) {
                return $review->reviews;
            }

        );

        return [
            'included'=>$this->withIncluded($reviews),
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($include) {
                if ($include instanceof Review) {
                    return new ReviewResource($include);
                }
            }
        );
    }
}
