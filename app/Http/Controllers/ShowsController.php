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
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shows = Show::orderBy('date', 'desc')->paginate(30);

        return view('shows.list', compact('shows'));
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

        return redirect()->route('show.index')->with('status', 'Show created.');
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
    public function edit(Show $show)
    {
        return view('shows.edit', compact('show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        $this->validate($request, [
            'venue' => 'required',
            'address' => 'required',
            'date' => 'date_format:Y-m-d',
            'time' => 'date_format:H:i',
        ]);

        $show->venue = $request->venue;
        $show->address = $request->address;
        $show->date = new Carbon("{$request->date} {$request->time}", 'Europe/London');
        $show->enabled = $request->get('enabled') ? true : false;
        $show->save();

        return redirect()->route('show.index')->with('status', 'Show updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        $show->delete();
        return redirect()->route('show.index')->with('status', 'Show deleted.');
    }
}
