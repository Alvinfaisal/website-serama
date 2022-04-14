<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Product $product)
  {

    // untuk mengecek apakah ada request ajax dari view index product
    if (request()->ajax()) {

      // mengambil semua query data pada model product
      $query = ProductGallery::where('products_id', $product->id);

      // script untuk memproses data table
      return DataTables::of($query)
        // menambakan column
        // button delete
        ->addColumn('action', function ($item) {
          return '
            <form class="inline-block" action="' . route('dashboard.gallery.destroy', $item->id) . '" method="POST">
            <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" onClick="return confirm(`Yakin akan dihapus?`) ">
              Hapus
            </button>
              ' . method_field('delete') . csrf_field() . '
            </form>
          ';
        })
        // edit column untuk menampilkan gambar
        ->editColumn('url', function ($item) {
          return '<img style="max-width: 150px;" src="' . Storage::url($item->url) . '"/>';
        })
        ->editColumn('is_featured', function ($item) {
          return $item->is_featured ? 'Yes' : 'No';
        })
        // Agar dapat terbaca sebagai elemen html
        ->rawColumns(['action', 'url'])
        ->make();
    }

    //view index produk
    return view('pages.dashboard.gallery.index', [
      'product' => $product
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Product $product)
  {
    return view('pages.dashboard.gallery.create', compact('product'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductGalleryRequest $request, Product $product)
  {
    //
    $files = $request->file('files');

    if ($request->hasFile('files')) {
      foreach ($files as $file) {
        $path = $file->store('public/gallery');

        ProductGallery::create([
          'products_id' => $product->id,
          'url' => $path
        ]);
      }
    }

    return redirect()->route('dashboard.product.gallery.index', $product->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    return abort(404);
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
    return abort(404);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProductGallery $gallery)
  {
    //
    $gallery->delete();

    return redirect()->route('dashboard.product.gallery.index', $gallery->products_id);
  }
}
