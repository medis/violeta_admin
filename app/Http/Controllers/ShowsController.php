<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
use App\Transformers\ShowsTransformer;
use Carbon\Carbon;

class ShowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shows = Show::where('enabled', 1)->paginate(10);

        return fractal($shows, new ShowsTransformer())->respond();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shows.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'venue' => 'required',
            'address' => 'required',
            'date' => 'date_format:Y-m-d',
            'time' => 'date_format:H:i',
        ]);

        Show::create([
            'venue' => $request->venue,
            'address' => $request->venue,
            'date' => new Carbon("{$request->date} {$request->time}", 'Europe/London')
        ]);

        return redirect()->route('home')->with('status', 'Show created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
