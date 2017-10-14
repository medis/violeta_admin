<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Show extends Resource
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
            'venue' => $this->venue,
            'address' => $this->address,
            'date' => $this->date
        ];
    }
}
