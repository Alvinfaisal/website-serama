<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MyTransactionController extends Controller
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
      $query = Transaction::with(['user'])->where('users_id', Auth::user()->id);

      // script untuk memproses data table
      return DataTables::of($query)
        // menambakan column
        // button gslleries,edit, delete
        ->addColumn('action', function ($transaction) {
          return '
          <a href="' . route('dashboard.my-transaction.show', $transaction->id) . '" class="shadow-lg bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 m-1 px-2 rounded">
              Show
            </a>
          ';
        })
        // edit column agar berformat angka(pakai tanda koma)
        ->editColumn('total_price', function ($item) {
          return number_format($item->total_price);
        })

        // Agar dapat terbaca sebagai elemen html
        ->rawColumns(['action'])
        ->make();
    }

    //view index produk
    return view('pages.dashboard.transaction.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Transaction $myTransaction)
  {
    if (request()->ajax()) {
      $query = TransactionItem::with(['product'])->where('transactions_id', $myTransaction->id);

      return DataTables::of($query)
        ->editColumn('product.price', function ($item) {
          return number_format($item->product->price);
        })
        ->make();
    }

    return view('pages.dashboard.transaction.show', [
      'transaction' => $myTransaction
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
