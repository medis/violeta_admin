<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreMusic;

class MusicsController extends Controller
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
    public function index()
    {
        $music = Music::orderBy('featured', 'desc')
                      ->orderBy('created_at', 'desc')
                      ->paginate(30);
        
        return view('music.index', compact('music'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Music::getTypes();
        return view('music.create', compact('types'));
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
            'title' => 'required',
            'source' => [
                'required',
                'url',
                'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/',
            ],
            'type' => ['required',
                Rule::in(Music::getTypes()),
            ],
        ]);

        if ($request->get('featured')) {
            // This music needs to be featured.
            // Unfeature currect one.
            Music::unfeatureMusic();
        }

        Music::create([
            'title' => $request->title,
            'source' => $request->source,
            'type' => $request->type,
            'featured' => $request->get('featured') ? true : false
        ]);

        return redirect()->route('music.index')->with('status', 'Music created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        $types = Music::getTypes();
        return view('music.edit', compact('music', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMusic $request, Music $music)
    {
        if ($request->get('featured')) {
            // This music needs to be featured.
            // Unfeature currect one.
            Music::unfeatureMusic();
        }

        $code = Music::parseCode($request->source);

        $music->title = $request->title;
        $music->source = $code;
        $music->type = $request->type;
        $music->featured = $request->get('featured') ? true : false;
        $music->enabled = $request->get('enabled') ? true : false;
        $music->save();

        return redirect()->route('music.index')->with('status', 'Song updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy(Music $music)
    {
        $music->delete();
        return redirect()->route('music.index')->with('status', 'Song deleted.');
    }
}
