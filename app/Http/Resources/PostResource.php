<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return    [
            'id'                   => $this->id,
            'title'                => $this->title ?? '',
            'description'          => $this->description ? substr($this->description, 0,512): '',
            'phone_number'         => $this->phone_number ?? '',
            'user_name'            => optional($this->user)->username ?? '',

        ];
    }
}
