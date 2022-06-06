@extends('layouts.landing')

@section('title', 'Cart')

@section('content')
    <!-- START: BREADCRUMB -->
    <section class="bg-gray-100 py-8 px-4">
        <div class="container mx-auto">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('landing.index') }}">Home</a>
                </li>
                <li>
                    <a href="#" aria-label="current-page">Keranjang Pembelian</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- END: BREADCRUMB -->

    <!-- START: COMPLETE YOUR ROOM -->
    <section class="md:py-16">
        <div class="container mx-auto px-4">
            <div class="flex -mx-4 flex-wrap">
                <div class="w-full px-4 mb-4 md:w-8/12 md:mb-0" id="shopping-cart">
                    <div class="flex flex-start mb-4 mt-8 pb-3 border-b border-gray-200 md:border-b-0">
                        <h3 class="text-2xl">Keranjang Pembelian</h3>
                    </div>

                    <div class="border-b border-gray-200 mb-4 hidden md:block">
                        <div class="flex flex-start items-center pb-2 -mx-4">
                            <div class="px-4 flex-none">
                                <div class="" style="width: 90px">
                                    <h6>Foto</h6>
                                </div>
                            </div>
                            <div class="px-4 w-5/12">
                                <div class="">
                                    <h6>Produk</h6>
                                </div>
                            </div>
                            <div class="px-4 w-5/12">
                                <div class="">
                                    <h6>Harga</h6>
                                </div>
                            </div>
                            <div class="px-4 w-2/12">
                                <div class="text-center">
                                    <h6>Aksi</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    @forelse ($carts as $cart)
                        <!-- START: ROW 1 -->
                        <div class="flex flex-start flex-wrap items-center mb-4 -mx-4" data-row="1">
                            <div class="px-4 flex-none">
                                <div class="" style="width: 90px; height: 90px">
                                    <img src="{{ $cart->product->product_galleries()->exists() ? Storage::url($cart->product->product_galleries->first()->url) : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mN88B8AAsUB4ZtvXtIAAAAASUVORK5CYII=' }}"
                                        alt="chair-1" class="object-cover rounded-xl w-full h-full" />
                                </div>
                            </div>
                            <div class="px-4 w-auto flex-1 md:w-5/12">
                                <div class="">
                                    <h6 class="font-semibold text-lg md:text-xl leading-8">
                                        {{ $cart->product->name ?? '' }}
                                    </h6>
                                    {{-- <span class="text-sm md:text-lg">Office Room</span> --}}
                                    <h6 class="font-semibold text-base md:text-lg block md:hidden">
                                        IDR {{ number_format($cart->product->price ?? '') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="px-4 w-auto flex-none md:flex-1 md:w-5/12 hidden md:block">
                                <div class="">
                                    <h6 class="font-semibold text-lg">IDR {{ number_format($cart->product->price ?? '') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="px-4 w-2/12">
                                <div class="text-center">
                                    <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 border-none focus:outline-none px-3 py-1">
                                            X
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END: ROW 1 -->
                    @empty

                        <p id="cart-empty" class="hidden text-center py-8">
                            Ooops... Cart is empty
                            <a href="{{ route('landing.index') }}" class="underline">Shop Now</a>
                        </p>
                    @endforelse


                </div>

                {{-- form checkout pembayaran --}}
                <div class="w-full md:px-4 md:w-4/12" id="shipping-detail">
                    <div class="bg-gray-100 px-4 py-6 md:p-8 md:rounded-3xl">
                        <form action="{{ route('checkout') }}" method="POST">

                            @csrf

                            <div class="flex flex-start mb-6">
                                <h3 class="text-2xl">Detail pembayaran</h3>
                            </div>

                            <div class="flex flex-col mb-4">
                                <label for="complete-name" class="text-sm mb-2">Nama Lengkap</label>
                                <input data-input name="name" type="text" id="complete-name"
                                    class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                    placeholder="Input your name" />
                            </div>

                            <div class="flex flex-col mb-4">
                                <label for="email" class="text-sm mb-2">Alamat Email</label>
                                <input data-input name="email" type="email" id="email"
                                    class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                    placeholder="Input your email address" />
                            </div>

                            <div class="flex flex-col mb-4">
                                <label for="address" class="text-sm mb-2">Alamat Pengiriman</label>
                                <input data-input name="address" type="text" id="address"
                                    class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                    placeholder="Input your address" />
                            </div>

                            <div class="flex flex-col mb-4">
                                <label for="phone-number" class="text-sm mb-2">No Handphone</label>
                                <input data-input name="phone" type="tel" id="phone-number"
                                    class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                    placeholder="Input your phone number" />
                            </div>

                            <div class="flex flex-col mb-4">
                                <label for="complete-name" class="text-sm mb-2">Pengiriman Tersedia</label>
                                <div class="flex -mx-2 flex-wrap">
                                    <div class="px-2 w-6/12 h-24 mb-4">
                                        <button type="button" data-value="fedex" data-name="courier"
                                            class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                            <img src="/frontend/images/logo/logo-jne.png" alt="Logo Fedex"
                                                class="object-contain max-h-full" />
                                        </button>
                                    </div>
                                    <div class="px-2 w-6/12 h-24 mb-4">
                                        <button type="button" data-value="dhl" data-name="courier"
                                            class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                            <img src="/frontend/images/logo/logo-jnt.png" alt="Logo dhl"
                                                class="object-contain max-h-full" />
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col mb-4">
                                <label for="complete-name" class="text-sm mb-2">Pembayaran hanya tersedia lewat
                                    midtrans</label>
                                <div class="flex -mx-2 flex-wrap">
                                    <div class="px-2 w-6/12 h-24 mb-4">
                                        <button type="button" data-value="midtrans" data-name="payment"
                                            class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                            <img src="/frontend/images/logo/logo-midtrans.png" alt="Logo midtrans"
                                                class="object-contain max-h-full" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="bg-serama hover:bg-blue-300 text-white focus:outline-none w-full py-3 rounded-full text-lg focus:text-black transition-all duration-200 px-6">
                                    Bayar Sekarang
                                </button>
                            </div>
                        </form>

                        <div class="text-center py-4 ">
                            <p class="text-sm">* Hubungi admin jika ada kendala</p>
                            <button type="submit"
                                class="text-white focus:outline-none w-full py-3 rounded-full text-lg focus:text-black transition-all duration-200 px-6"
                                style="background-color: #075E54; ">
                                <a
                                    href="https://wa.me/6282245793981?text=Saya mengalami kendala ketika ingin memesan? Apakah bisa dibantu">Chat
                                    Via WhatsApp</a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- END: COMPLETE YOUR ROOM -->
@endsection
