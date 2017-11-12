<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Radio extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'link' => $this->link,
        ];
    }
}
