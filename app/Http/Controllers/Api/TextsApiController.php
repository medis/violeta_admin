<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Text;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

use App\Http\Resources\Texts as TextsResource;

class TextsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;

        $texts = Text::where('enabled', 1)->get();

        return TextsResource::collection($texts);
    }
}
