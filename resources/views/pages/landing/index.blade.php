@extends('layouts.landing')

@section('title', 'Landing')

@section('content')

    <!-- START: HERO -->
    <section class="flex items-center hero">
        <div
            class="w-full absolute z-20 inset-0 md:relative md:w-1/2 text-center flex flex-col justify-center hero-caption text-white md:text-black">
            <h1 class="text-3xl md:text-5xl leading-tight font-semibold">
                Beli Ayam <br class="" />Jadi Mudah dan Cepat
            </h1>
            <h2 class="px-8 text-base md:px-0 md:text-lg my-6 tracking-wide">
                Sebuah aplikasi website untuk mengelola kegiatan komunitas

                <br class="hidden lg:block" />para penghobi ayam serama dibanyuwangi
            </h2>
            <div>
                <a href="{{ route('landing.product-page') }}"
                    class="bg-serama hover:bg-blue-300 text-white rounded-full px-8 py-3 mt-4 inline-block flex-none transition duration-200">Beli
                    Sekarang
                </a>
            </div>
        </div>

        <div class="w-full inset-0 md:relative md:w-1/2">
            <div class="relative hero-image">
                <div class="overlay right-0 bottom-0 md:inset-0">
                    <button class="video hero-cta focus:outline-none z-30 modal-trigger"
                        data-content='<div class="w-screen pb-56 md:w-88 md:pb-56 relative z-50">
                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="absolute w-full h-full">
                                                                                                                                                                                                                                                                                                                                                                                                                                                  <iframe
                                                                                                                                                                                                                                                                                                                                                                                                                                                    width="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                    height="100%"
                                                                                                                                                                                                                                                                                                                                                                                                                                                    src="{{ url('https://www.youtube.com/embed/fEKVaEwCU0E') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                                                    frameborder="0"
                                                                                                                                                                                                                                                                                                                                                                                                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                                                                                                                                                                                                                                                                                                                                                                                                    allowfullscreen
                                                                                                                                                                                                                                                                                                                                                                                                                                                  ></iframe>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                              </div>'></button>
                </div>
                <img src="/frontend/images/bg-landings.svg" alt="hero 1"
                    class="absolute inset-0 md:relative w-full h-full object-cover object-center" />
            </div>
        </div>
    </section>
    <!-- END: HERO -->

    <!-- START: FITUR/KEUNGGULAN -->
    <section class="text-gray-600 body-font">
        <h1 class="text-3xl font-medium title-font text-gray-900  text-center">Keunggulan kami</h1>
        <p class="text-sm text-center">Menyediakan pelayanan terbaik bagi customer</p>
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                        <div
                            class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Shooting Stars</h2>
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast
                                vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                        <div
                            class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast
                                vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: FITUR/KEUNGGULAN -->

    <!-- START: JUST ARRIVED -->
    <section class="flex flex-col py-24 mb-12 bg-serama text-white">
        <div class="container mx-auto mb-4 pb-12">
            <h1 class="text-3xl font-medium title-font text-center">Ayam serama terbaru</h1>
            <p class="text-sm text-center">Kualitas terbaik dan kontes</p>
        </div>
        <div class="overflow-x-hidden px-4" id="carousel">
            <div class="container mx-auto"></div>
            <!-- <div class="overflow-hidden z-10"> -->
            <div class="flex -mx-4 flex-row relative">

                @forelse ($products as $product)
                    <div class="px-4 relative card group">
                        <div class="rounded-xl overflow-hidden card-shadow relative" style="width: 287px; height: 386px">
                            <div
                                class="absolute opacity-0 group-hover:opacity-100 transition duration-200 flex items-center justify-center w-full h-full bg-black bg-opacity-35">
                                <div class="bg-white text-black rounded-full w-16 h-16 flex items-center justify-center">
                                    <svg class="fill-current" width="43" height="24" viewBox="0 0 43 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M41.6557 10.0065C39.2794 6.95958 36.2012 4.43931 32.7542 2.71834C29.2355 0.961548 25.4501 0.0500333 21.4985 0.00223289C21.3896 -0.000744296 20.9526 -0.000744296 20.8438 0.00223289C16.8923 0.050116 13.1068 0.961548 9.58807 2.71834C6.14106 4.43931 3.06307 6.9595 0.686613 10.0065C-0.228871 11.1802 -0.228871 12.8198 0.686613 13.9935C3.06299 17.0404 6.14106 19.5607 9.58807 21.2817C13.1068 23.0385 16.8922 23.95 20.8438 23.9978C20.9526 24.0007 21.3896 24.0007 21.4985 23.9978C25.45 23.9499 29.2355 23.0385 32.7542 21.2817C36.2012 19.5607 39.2793 17.0405 41.6557 13.9935C42.5712 12.8196 42.5712 11.1802 41.6557 10.0065ZM10.3576 19.7406C7.13892 18.1335 4.26445 15.7799 2.04487 12.9341C1.61591 12.3841 1.61591 11.6159 2.04487 11.0659C4.26436 8.22009 7.13883 5.86646 10.3576 4.25944C11.2717 3.80311 12.2053 3.40846 13.1561 3.07436C10.71 5.27317 9.16886 8.45975 9.16886 12C9.16886 15.5403 10.7101 18.7272 13.1564 20.9259C12.2056 20.5918 11.2718 20.197 10.3576 19.7406ZM21.1712 22.2798C15.5028 22.2798 10.8913 17.6683 10.8913 11.9999C10.8913 6.33148 15.5028 1.72007 21.1712 1.72007C26.8396 1.72007 31.4511 6.33156 31.4511 12C31.4511 17.6684 26.8396 22.2798 21.1712 22.2798ZM40.2976 12.9341C38.0781 15.7798 35.2036 18.1335 31.9849 19.7405C31.0718 20.1963 30.1388 20.5892 29.1892 20.923C31.6336 18.7243 33.1736 15.5387 33.1736 11.9999C33.1736 8.45918 31.6321 5.27218 29.1856 3.07336C30.1366 3.40755 31.0705 3.80269 31.9849 4.25928C35.2036 5.86629 38.0781 8.21993 40.2976 11.0657C40.7265 11.6158 40.7265 12.384 40.2976 12.9341Z" />
                                        <path
                                            d="M21.1712 7.60071C18.7454 7.60071 16.772 9.57417 16.772 11.9999C16.772 14.4257 18.7454 16.3991 21.1712 16.3991C23.5969 16.3991 25.5704 14.4257 25.5704 11.9999C25.5705 9.57417 23.597 7.60071 21.1712 7.60071ZM21.1712 14.6767C19.6952 14.6767 18.4944 13.476 18.4944 11.9999C18.4944 10.5239 19.6951 9.32318 21.1712 9.32318C22.6471 9.32318 23.8479 10.5239 23.8479 11.9999C23.848 13.476 22.6471 14.6767 21.1712 14.6767Z" />
                                    </svg>
                                </div>
                            </div>
                            <img src="{{ $product->product_galleries()->exists() ? Storage::url($product->product_galleries->first()->url) : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mN88B8AAsUB4ZtvXtIAAAAASUVORK5CYII=' }}"
                                alt="" class="w-full h-full object-cover object-center" />
                        </div>
                        <h5 class="text-lg font-semibold mt-4">{{ $product->name }}</h5>
                        <span class="">IDR {{ number_format($product->price) }}</span>
                        <a href="{{ route('landing.details', $product->slug) }}" class="stretched-link">
                        </a>
                    </div>
                @empty
                    {{-- empty --}}
                @endforelse


            </div>
            <!-- </div> -->
        </div>
    </section>
    <!-- END: JUST ARRIVED -->

    <!-- START: ORDER STEP -->
    <section class="text-gray-600 body-font">
        <h1 class="text-3xl font-medium title-font text-gray-900  text-center">Langkah Pemesanan</h1>
        <p class="text-sm text-center">Harap dibaca dengan teliti sebelum membeli</p>
        <div class="container px-5 pt-12 pb-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap w-full">

                <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">

                    {{-- Step 1 --}}
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 1</h2>
                            <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk
                                bespoke try-hard cliche palo santo offal.</p>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 2</h2>
                            <p class="leading-relaxed">Vice migas literally kitsch +1 pok pok. Truffaut hot chicken
                                slow-carb health goth, vape typewriter.</p>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <circle cx="12" cy="5" r="3"></circle>
                                <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 3</h2>
                            <p class="leading-relaxed">Coloring book nar whal glossier master cleanse umami. Salvia +1
                                master cleanse blog taiyaki.</p>
                        </div>
                    </div>

                    {{-- Step 4 --}}
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 4</h2>
                            <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk
                                bespoke try-hard cliche palo santo offal.</p>
                        </div>
                    </div>

                    {{-- Step 5 --}}
                    <div class="flex relative">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">FINISH</h2>
                            <p class="leading-relaxed">Pitchfork ugh tattooed scenester echo park gastropub whatever
                                cold-pressed retro.</p>
                        </div>
                    </div>

                </div>

                {{-- step order illustration --}}
                <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12"
                    src="/frontend/images/step-order.jpg" alt="step">
            </div>
        </div>
    </section>
    <!-- END: ORDER STEP -->

    <!-- START: TESTIMONI -->
    <section class="text-white body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-3xl font-medium title-font text-gray-900 text-center">Testimoni</h1>
            <p class="text-sm text-center text-black">Beberapa review dari pembeli</p>
            <div class="flex flex-wrap -m-4 pt-12">
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-serama p-8 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path
                                d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                            </path>
                        </svg>
                        <p class="leading-relaxed mb-6">Synth chartreuse iPhone lomo cray raw denim brunch everyday carry
                            neutra before they sold out fixie 90's microdosing. Tacos pinterest fanny pack venmo,
                            post-ironic heirloom try-hard pabst authentic iceland.</p>
                        <a class="inline-flex items-center">
                            <img alt="testimonial" src="/frontend/images/user1.svg"
                                class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Holden Caulfield</span>
                                <span class="text-white text-sm">UI DEVELOPER</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-serama p-8 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path
                                d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                            </path>
                        </svg>
                        <p class="leading-relaxed mb-6">Synth chartreuse iPhone lomo cray raw denim brunch everyday carry
                            neutra before they sold out fixie 90's microdosing. Tacos pinterest fanny pack venmo,
                            post-ironic heirloom try-hard pabst authentic iceland.</p>
                        <a class="inline-flex items-center">
                            <img alt="testimonial" src="/frontend/images/user2.svg"
                                class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Alper Kamu</span>
                                <span class="text-white text-sm">DESIGNER</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: TESTIMONI -->

    <!-- START: BLOG -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-center text-gray-900  ">
                Artikel Terbaru
            </h1>
            <p class="text-sm text-center">Tips dan trik yang mungkin anda butuhkan</p>
            <div class="flex flex-wrap -m-4 pt-12">
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400"
                            alt="blog">
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The Catalyzer</h1>
                            <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing
                                microdosing tousled waistcoat.</p>
                            <div class="flex items-center flex-wrap ">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <span
                                    class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>1.2K
                                </span>
                                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                        </path>
                                    </svg>6
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/721x401"
                            alt="blog">
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The 400 Blows</h1>
                            <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing
                                microdosing tousled waistcoat.</p>
                            <div class="flex items-center flex-wrap">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <span
                                    class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>1.2K
                                </span>
                                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                        </path>
                                    </svg>6
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/722x402"
                            alt="blog">
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Shooting Stars</h1>
                            <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing
                                microdosing tousled waistcoat.</p>
                            <div class="flex items-center flex-wrap ">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <span
                                    class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>1.2K
                                </span>
                                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                        </path>
                                    </svg>6
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: BLOG -->

@endsection




























{{-- <!-- START: BROWSE THE CHICKEN-->
    <section class="flex bg-gray-100 py-16 px-4" id="browse-the-room">
        <div class="container mx-auto">
            <div class="flex flex-start mb-4">
                <h3 class="text-2xl capitalize font-semibold">
                    browse the room <br class="" />that we designed for you
                </h3>
            </div>
            <div class="grid grid-rows-2 grid-cols-9 gap-4">
                <div class="relative col-span-9 row-span-1 md:col-span-4 card" style="height: 180px">
                    <div class="card-shadow rounded-xl">
                        <img src="/frontend/images/content/image-catalog-1.png" alt=""
                            class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                    </div>
                    <div class="overlay left-0 top-0 bottom-0 flex justify-center flex-col pl-48 md:pl-72">
                        <h5 class="text-lg font-semibold">Living Room</h5>
                        <span class="">18.309 items</span>
                    </div>
                    <a href="details.html" class="stretched-link">
                        <!-- fake children -->
                    </a>
                </div>
                <div class="relative col-span-9 row-span-1 md:col-span-2 md:row-span-2 card">
                    <div class="card-shadow rounded-xl">
                        <img src="/frontend/images/content/image-catalog-3.png" alt=""
                            class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                    </div>
                    <div
                        class="overlay right-0 left-0 top-0 bottom-0 md:bottom-auto flex justify-center md:items-center flex-col pl-48 md:pl-0 pt-0 md:pt-12">
                        <h5 class="text-lg font-semibold">Decoration</h5>
                        <span class="">77.392 items</span>
                    </div>
                    <a href="details.html" class="stretched-link">
                        <!-- fake children -->
                    </a>
                </div>
                <div class="relative col-span-9 row-span-1 md:col-span-3 md:row-span-2 card">
                    <div class="card-shadow rounded-xl">
                        <img src="/frontend/images/content/image-catalog-4.png" alt=""
                            class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                    </div>
                    <div
                        class="overlay right-0 left-0 top-0 bottom-0 md:bottom-auto flex justify-center md:items-center flex-col pl-48 md:pl-0 pt-0 md:pt-12">
                        <h5 class="text-lg font-semibold">Living Room</h5>
                        <span class="">22.094 items</span>
                    </div>
                    <a href="details.html" class="stretched-link">
                        <!-- fake children -->
                    </a>
                </div>
                <div class="relative col-span-9 row-span-1 md:col-span-4 card">
                    <div class="card-shadow rounded-xl">
                        <img src="/frontend/images/content/image-catalog-2.png" alt=""
                            class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                    </div>
                    <div class="overlay left-0 top-0 bottom-0 flex justify-center flex-col pl-48 md:pl-72">
                        <h5 class="text-lg font-semibold">Children Room</h5>
                        <span class="">837 items</span>
                    </div>
                    <a href="details.html" class="stretched-link">
                        <!-- fake children -->
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END: BROWSE THE CHICKEN --> --}}

{{-- <!-- START: CLIENTS -->
    <section class="container mx-auto">
        <div class="flex justify-center flex-wrap">
            <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 md:my-0">
                <img src="{{ asset('/frontend/images/content/logo-adobe.svg') }}" alt="" class="mx-auto" />
            </div>
            <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 md:my-0">
                <img src="{{ asset('/frontend/images/content/logo-ikea.svg') }}" alt="" class="mx-auto" />
            </div>
            <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 md:my-0">
                <img src="{{ asset('/frontend/images/content/logo-hermanmiller.svg') }}" alt="" class="mx-auto" />
            </div>
            <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 md:my-0">
                <img src="{{ asset('/frontend/images/content/logo-miele.svg') }}" alt="" class="mx-auto" />
            </div>
        </div>
    </section>
    <!-- END: CLIENTS --> --}}
