<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class UserResource extends JsonResource
{
//    public $with = ['status' => 'ok', 'data' => ['name' => 'mohammad']];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'username' => $this->name,
            'email' => $this->email,
            'articles' => $this->whenLoaded('articles', function () use ($request) {
                return $request->with === 'articles' ? ArticleResource::collection($this->articles) : new MissingValue();
            }),
//            'articles' => $this->whenLoaded('articles', 'bale', 'kheir'),
//            'type' => $this->when($this->id === 1, 'admin'),
//            'foo' => $this->when($this->id === 1, 'bar')
//            $this->merge([
//                'a' => 'b',
//                'c' => 'd',
//                'username' => 'admin',
//            ]),
            $this->mergeWhen($this->id === 1, [
                'type' => 'admin',
                'foo' => 'bar'
            ])
        ];

        return $result;
    }

    public function with($request)
    {

        return [
            'status' => strtoupper('ok'),
            'data' => ['name' => 'mohammad'],
//            'relations' => [
//                'articles' => $this->articles
//            ]
        ];
    }
}
