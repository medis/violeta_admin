<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Show;
use App\Transformers\ShowsTransformer;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

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

        return fractal($shows, new ShowsTransformer())->respond();
    }
}
