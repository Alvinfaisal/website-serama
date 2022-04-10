<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
  public function index(Request $request)
  {
    return view('pages.landing.index');
  }

  public function details(Request $request, $slug)
  {
    return view('pages.landing.detail');
  }

  public function cart(Request $request)
  {
    return view('pages.landing.cart');
  }

  public function success(Request $request)
  {
    return view('pages.landing.success');
  }
}
