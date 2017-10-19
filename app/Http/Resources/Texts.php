<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Texts extends Resource
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
            'machine_name' => $this->machine_name,
            'title' => $this->title,
            'body' => $this->body
        ];
    }
}
