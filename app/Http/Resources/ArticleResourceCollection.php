<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleResourceCollection extends ResourceCollection
{
    static $wrap = 'attrs';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            static::$wrap => $this->collection,
            'foo' => 'bar'
        ];
    }

    public function with($request)
    {
        return [
            'fooooooo' => 'bbbbaaaaaaaaar',
            'meta' => ['x' => 'y']
        ];
    }

//    public function toResponse($request)
//    {
//        $response = parent::toResponse($request);
//
//        $response->setJson(collect(['a' => 'b']));
//        return $response;
//    }
}
