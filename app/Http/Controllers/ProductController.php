<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    // untuk mengecek apakah ada request ajax dari view index product
    if (request()->ajax()) {

      // mengambil semua query data pada model product
      $query = Product::query();

      // script untuk memproses data table
      return DataTables::of($query)
        // menambakan column
        // button gslleries,edit, delete
        ->addColumn('action', function ($product) {
          return '
          <a href="' . route('dashboard.product.gallery.index', $product->id) . '" class="shadow-lg bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 m-1 px-2 rounded">
              Gallery
            </a>
            <a href="' . route('dashboard.product.edit', $product->id) . '" class="shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 m-1 rounded">
              Ubah
            </a>
            <form class="inline-block" action="' . route('dashboard.product.destroy', $product->id) . '" method="POST">
            <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" onClick="return confirm(`Yakin akan dihapus?`) ">
              Hapus
            </button>
              ' . method_field('delete') . csrf_field() . '
            </form>
          ';
        })
        // edit column agar berformat angka(pakai tanda koma)
        ->editColumn('price', function ($item) {
          return number_format($item->price);
        })

        // Agar dapat terbaca sebagai elemen html
        ->rawColumns(['action'])
        ->make();
    }

    //view index produk
    return view('pages.dashboard.product.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // menampilakn view create produk
    return view('pages.dashboard.product.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductRequest $request)
  {
    // Client melakukan request dengan memasukkan inputan kedalam form
    // mengambil data validasi request dari file ProductRequest
    $data = $request->all();
    // custom field slug - yang didapat dari field name akan terisi otomatis
    $data['slug'] = Str::slug($request->name);

    // save data kedalam database - Table Product
    Product::create($data);

    // Serve Response - jika sukses akan kembali kehalaman utama product
    return redirect()->route('dashboard.product.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // tidak digunakan
    return abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {


    //menampilkan view untuk edit data
    return view('pages.dashboard.product.edit', [
      'product' => $product
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ProductRequest $request, Product $product)
  {
    $data = $request->all();

    $data['slug'] = Str::slug($request->name);

    $product->update($data);

    return redirect()->route('dashboard.product.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $product->delete();

    return redirect()->route('dashboard.product.index');
  }

  public function product_page(Request $request)
  {
    $products = Product::with(['product_galleries'])->latest()->get();
    return view('pages.landing.product-page', [
      'products' => $products
    ]);
  }
}
