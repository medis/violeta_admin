<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Music;

class MusicTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Music $song)
    {
        return [
            'title' => $song->title,
            'source' => $song->source,
            'type' => $song->type,
            'featured' => $song->featured
        ];
    }
}
