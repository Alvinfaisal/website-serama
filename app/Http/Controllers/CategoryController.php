<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::latest('created_at')->paginate(20);

    return view('pages.dashboard.categories.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.dashboard.categories.create');
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

    Category::create([
      'title' => $request->title
    ]);
    return redirect(route('dashboard.categories.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    return abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('pages.dashboard.categories.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $request->validate([
      'title' => 'required|min:2|max:255',

    ]);
    $category->slug = null;
    $category->update([
      'title' => $request->title,
    ]);
    return redirect(route('dashboard.categories.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    $category->delete();
    return redirect(route('dashboard.categories.index'));
  }

  public function articles(Category $category)
  {
    $tags = Tag::latest()->take(20)->get();
    $categories = Category::latest()->take(20)->get();
    $articles = $category->articles()->paginate(9);
    return view('pages.landing.article-page', compact('articles', 'tags', 'categories'));
  }
}
