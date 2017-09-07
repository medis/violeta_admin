<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Blog;
use App\Transformers\BlogsTransformer;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class BlogsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;

        $blogs = Blog::where('enabled', 1)
                     ->orderBy('date', 'desc')
                     ->paginate($limit);

        return fractal($blogs, new BlogsTransformer())->respond();
    }
}
