<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Blog;

class BlogsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Blog $blog)
    {
        return [
            'title' => $blog->title,
            'source' => $blog->source,
            'link' => $blog->link,
            'date' => $blog->date
        ];
    }
}
