<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Radio;
use App\Http\Controllers\Controller;
use App\Http\Resources\Radio as RadioResource;

class RadiosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;

        $radios = Radio::where('enabled', 1)
                ->orderBy('title', 'asc')
                ->orderBy('created_at', 'desc')
                ->paginate($limit);

        return RadioResource::collection($radios);
    }
}
