<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BlogsController extends Controller
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
        $blogs = Blog::orderBy('date', 'desc')->paginate(30);
        
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'source' => 'required',
            'link' => 'required|url',
            'date' => 'date_format:Y-m-d',
        ]);

        Blog::create([
            'title' => $request->title,
            'source' => $request->source,
            'link' => $request->link,
            'date' => new Carbon("{$request->date}", 'Europe/London')
        ]);

        return redirect()->route('blog.index')->with('status', 'Press created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'source' => 'required',
            'link' => 'required|url',
            'date' => 'date_format:Y-m-d',
        ]);

        $blog->title = $request->title;
        $blog->source = $request->source;
        $blog->link = $request->link;
        $blog->date = new Carbon("{$request->date}", 'Europe/London');
        $blog->enabled = $request->get('enabled') ? true : false;
        $blog->save();

        return redirect()->route('blog.index')->with('status', 'Press updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('status', 'Press deleted.');
    }
}
