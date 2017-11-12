<?php

namespace App\Http\Controllers;

use App\Radio;
use Illuminate\Http\Request;

class RadioController extends Controller
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
        $radios = Radio::orderBy('title', 'ASC')
        ->orderBy('created_at', 'desc')
        ->paginate(30);

        return view('radios.index', compact('radios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->validate([
            'title' => 'required',
            'link' => 'required|url'
        ]);

        Radio::create($post);

        return redirect()->route('radio.index')->with('status', 'Press created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\radio  $radio
     * @return \Illuminate\Http\Response
     */
    public function edit(Radio $radio)
    {
        return view('radios.edit', compact('radio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\radio  $radio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radio $radio)
    {
        $post = $request->validate([
            'title' => 'required',
            'link' => 'required|url'
        ]);

        $post['enabled'] = $request->get('enabled') ? true : false;

        tap($radio)->update($post);

        return redirect()->route('radio.index')->with('status', 'Radio updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\radio  $radio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radio $radio)
    {
        $radio->delete();
        return redirect()->route('radio.index')->with('status', 'Radio deleted.');
    }
}
