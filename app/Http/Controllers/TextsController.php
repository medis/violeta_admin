<?php

namespace App\Http\Controllers;

use App\Text;
use Illuminate\Http\Request;

class TextsController extends Controller
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
        $texts = Text::orderBy('title', 'desc')->paginate(30);
        
        return view('texts.list', compact('texts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function edit(Text $text)
    {
        return view('texts.edit', compact('text'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Text $text)
    {
        $post = $request->validate([
            'body' => 'required',
        ]);

        tap($text)->update($post);

        return redirect()->route('text.index')->with('status', 'Text updated.');
    }
}
