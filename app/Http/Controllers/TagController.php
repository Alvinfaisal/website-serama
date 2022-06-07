<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tags = Tag::latest('created_at')->paginate(20);

    return view('pages.dashboard.tags.index', compact('tags'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.dashboard.tags.create');
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
      'title' => 'required|min:2|max:255'
    ]);

    Tag::create([
      'title' => $request->title
    ]);
    return redirect(route('dashboard.tags.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function show(Tag $tag)
  {
    return abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function edit(Tag $tag)
  {
    return view('pages.dashboard.tags.edit', compact('tag'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Tag $tag)
  {
    $request->validate([
      'title' => 'required|min:2|max:255',

    ]);
    $tag->slug = null;
    $tag->update([
      'title' => $request->title,
    ]);
    return redirect(route('dashboard.tags.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tag $tag)
  {
    $tag->delete();
    return redirect(route('dashboard.tags.index'));
  }
}
