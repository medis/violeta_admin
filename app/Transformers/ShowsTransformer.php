<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Show;

class ShowsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Show $show)
    {
        return [
            'venue' => $show->venue,
            'address' => $show->address,
            'date' => $show->date
        ];
    }
}
