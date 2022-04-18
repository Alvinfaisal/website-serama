<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Midtrans\Config;
use Midtrans\Snap;

class LandingController extends Controller
{
  public function index(Request $request)
  {
    $products = Product::with(['product_galleries'])->latest()->get();
    return view('pages.landing.index', [
      'products' => $products
    ]);
  }

  public function details(Request $request, $slug)
  {
    $product = Product::with(['product_galleries'])->where('slug', $slug)->firstOrFail();

    $recommendations = Product::with(['product_galleries'])->inRandomOrder()->limit(4)->get();

    return view('pages.landing.detail', [
      'product' => $product,
      'recommendations' => $recommendations
    ]);
  }

  public function cartAdd($id)
  {
    Cart::create([
      'users_id' => Auth::user()->id,
      'products_id' => $id,
    ]);

    return redirect('cart');
  }

  public function cartDelete($id)
  {
    $item = Cart::findOrFail($id);

    $item->delete();

    return redirect('cart');
  }


  public function cart(Request $request)
  {
    $carts = Cart::with(['product.product_galleries'])->where('users_id', Auth::user()->id)->get();

    return view('pages.landing.cart', [
      'carts' => $carts
    ]);
  }

  public function checkout(CheckoutRequest $request)
  {
    $data = $request->all();

    // Get carts data
    $carts = Cart::with(['product'])->where('users_id', Auth::user()->id)->get();

    // Add to transacton data
    $data['users_id'] = Auth::user()->id;
    $data['total_price'] = $carts->sum('product.price');

    // create transaction
    $transaction = Transaction::create($data);

    // create transaction item
    foreach ($carts as $cart) {
      $item[] = TransactionItem::create([
        'transactions_id' => $transaction->id,
        'users_id' => $cart->users_id,
        'products_id' => $cart->products_id
      ]);
    }

    // delete cart after transaction
    Cart::where('users_id', Auth::user()->id)->delete();

    // konfigurasi midtrans
    Config::$serverKey = config('services.midtrans.serverKey');
    Config::$isProduction = config('services.midtrans.isProduction');
    Config::$isSanitized = config('services.midtrans.isSanitized');
    Config::$is3ds = config('services.midtrans.is3ds');

    // setup variable midtrans
    // Setup midtrans variable
    $midtrans = array(
      'transaction_details' => array(
        'order_id' =>  'SRM-' . $transaction->id,
        'gross_amount' => (int) $transaction->total_price,
      ),
      'customer_details' => array(
        'first_name'    => $transaction->name,
        'email'         => $transaction->email
      ),
      'enabled_payments' => array('gopay', 'bank_transfer'),
      'vtweb' => array()
    );

    try {
      // Ambil halaman payment midtrans
      $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

      $transaction->payment_url = $paymentUrl;
      $transaction->save();

      // Redirect ke halaman midtrans
      return redirect($paymentUrl);
    } catch (Exception $e) {
      return $e;
    }
    // payment process
  }


  public function success(Request $request)
  {
    return view('pages.landing.success');
  }
}
