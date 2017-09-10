<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Music;
use App\Transformers\MusicTransformer;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class MusicApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;

        $music = Music::where('enabled', 1)
                ->orderBy('featured', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate($limit);

        return fractal($music, new MusicTransformer())->respond();
    }
}
