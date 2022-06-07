<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $articles = Article::latest('created_at')->paginate(9);
    return view('pages.dashboard.articles.index', compact('articles'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    return view('pages.dashboard.articles.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ArticleRequest $request)
  {
    $imagesUrl = $this->uploadImages($request->file('images'));
    $article = auth()->user()->articles()->create(array_merge($request->all(), ['images' => $imagesUrl]));
    $article->categories()->sync($request['categories']);
    $article->tags()->sync($request['tags']);

    return redirect(route('dashboard.articles.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function show(Article $article)
  {
    //tidak digunakan
    return abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function edit(Article $article)
  {
    return view('pages.dashboard.articles.edit', compact('article'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function update(ArticleRequest $request, Article $article)
  {
    $file = $request->file('images');
    $inputs = $request->all();

    if ($file) {
      $inputs['images'] = $this->uploadImages($request->file('images'));

      foreach ($article->images['images'] as $key => $image) {
        if (File::exists(public_path($image)))
          File::delete(public_path($image));
      }
    } else {
      $inputs['images'] = $article->images;
      $inputs['images']['thumb'] = $inputs['imagesThumb'];
    }

    unset($inputs['imagesThumb']);
    $article->slug = null;
    $article->update($inputs);
    $article->categories()->sync($request['categories']);
    $article->tags()->sync($request['tags']);

    return redirect(route('dashboard.articles.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(Article $article)
  {
    foreach ($article->images['images'] as $key => $image) {
      if (File::exists(public_path($image)))
        File::delete(public_path($image));
    }
    $article->delete();
    return redirect(route('dashboard.articles.index'));
  }

  protected function uploadImages($file)
  {
    $year = Carbon::now()->year;
    $imagePath = "/upload/images/{$year}/";
    $filename = $file->getClientOriginalName();

    if (file_exists(public_path($imagePath) . $filename)) {

      $filename = Carbon::now()->timestamp . $filename;
    }

    $file = $file->move(public_path($imagePath), $filename);


    $sizes = ["300", "600", "900"];
    $url['images'] = $this->resize($file->getRealPath(), $sizes, $imagePath, $filename);
    $url['thumb'] = $url['images']['original'];

    return $url;
  }

  private function resize($path, $sizes, $imagePath, $filename)
  {
    $images['original'] = $imagePath . $filename;

    foreach ($sizes as $size) {
      $images[$size] = $imagePath . "{$size}_" . $filename;

      Image::make($path)->resize($size, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save(public_path($images[$size]));
    }

    return $images;
  }

  public function article_page()
  {
    $articles = Article::latest('created_at')->paginate(9);
    $tags = Tag::latest()->take(20)->get();
    $categories = Category::latest()->take(20)->get();
    return view('pages.landing.article-page', compact('articles', 'tags', 'categories'));
  }

  public function article_single(Request $request, Article $article, $slug)
  {
    // dd($article);
    // $tags = "";
    // foreach ($article->tags as $tag)  $tags .= $tag['title'] . ",";
    // $tags = substr($tags, 0, -1);
    // $categories = "";
    // foreach ($article->categories as $category)  $categories .= $category['title'] . ",";
    // $categories = substr($categories, 0, -1);

    // $article->increment('viewCount');
    // dd($article);
    // $articles = $article->latest()->take(5)->get();
    $article = Article::with(['tags', 'categories'])->where('slug', $slug)->firstOrFail();
    return view('pages.landing.single-article', compact('article'));
  }
}
