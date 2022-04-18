<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
  public function callback()
  {
    // set konfigurasi midtrans
    Config::$serverKey = config('services.midtrans.serverKey');
    Config::$isProduction = config('services.midtrans.isProduction');
    Config::$isSanitized = config('services.midtrans.isSanitized');
    Config::$is3ds = config('services.midtrans.is3ds');

    // Menggunakan instance midtrans notification
    $notification = new Notification();

    // assign varible beberapa field dari instance Notification()- untuk dikelola kembali
    $status = $notification->transaction_status;
    $type = $notification->payment_type;
    $fraud = $notification->fraud_status;
    $order_id = $notification->order_id;

    // mengambil id transaksi
    $order = explode('-', $order_id);
    // fungsi explode untuk memecah string menjadi array
    // contoh misal order_id = SRM-2 maka akan menjadi array['SRM', 2] 

    // cari transaksi berdasarkan id
    $transaction = Transaction::findOrFail($order[1]); // dicari berdasarkan id yang sama

    // handle notification status midtrans
    if ($status == 'capture') {
      if ($type == 'credit_card') {
        if ($fraud == 'challenge') {
          $transaction->status = 'PENDING';
        } else {
          $transaction->status = 'SUCCESS';
        }
      }
    } else if ($status == 'settlement') {
      $transaction->status = 'SUCCESS';
    } else if ($status == 'pending') {
      $transaction->status = 'PENDING';
    } else if ($status == 'deny') {
      $transaction->status = 'CANCELLED';
    } else if ($status == 'expire') {
      $transaction->status = 'CANCELLED';
    } else if ($status == 'cancel') {
      $transaction->status = 'CANCELLED';
    }

    // simpan transaksi - disini yang diubah hanya field status pada tabel Transaction
    $transaction->save();

    // return response
    return response()->json([
      'meta' => [
        'code' => 200,
        'message' => 'Midtrans Notification Success!'
      ]
    ]);
  }
}
