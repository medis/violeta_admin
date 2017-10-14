<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Show;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

use App\Http\Resources\Show as ShowResource;

class ShowsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;

        $shows = Show::where('enabled', 1)
                     ->whereDate('date', '>=', Carbon::today()->toDateString())
                     ->orderBy('date', 'asc')
                     ->paginate($limit);

        return ShowResource::collection($shows);
    }
}
