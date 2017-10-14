<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Blogs extends Resource
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
            'source' => $this->source,
            'link' => $this->link,
            'date' => $this->date
        ];
    }
}
