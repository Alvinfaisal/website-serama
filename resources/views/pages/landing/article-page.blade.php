@extends('layouts.landing')

@section('title', 'All artikel')

@section('content')
    <!-- START: BREADCRUMB -->
    <section class="bg-gray-100 py-8 px-4">
        <div class="container mx-auto">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#" aria-label="current-page">Semua Artikel</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- END: BREADCRUMB -->

    <!-- Page Content -->
    <main>

        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 py-6">

                    <h1 class="text-2xl font-extrabold tracking-tight text-indigo-800">Artikel Terbaru</h1>

                    <div
                        class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:gap-x-8">

                        @foreach ($articles as $article)
                            <div class="bg-white shadow-sm border border-gray-80 border-opacity-60 h-full flex flex-col">
                                <a href="{{ route('landing.article-page.single', [$article->slug]) }}">
                                    <div
                                        class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 overflow-hidden lg:h-80 lg:aspect-none">
                                        <img src="{{ $article->images['thumb'] }}" alt="{{ $article->title }}"
                                            class="w-full h-full object-center transform transition duration-200 hover:scale-105 object-cover lg:w-full lg:h-full">
                                    </div>
                                </a>
                                <div class="mt-2 p-3 flex flex-col flex-1">
                                    <a href="{{ route('landing.article-page.single', [$article->slug]) }}">
                                        <h1
                                            class="text-lg font-bold text-gray-800 hover:text-indigo-800 duration-200 transition">
                                            {{ $article->title }}</h1>
                                    </a>
                                    <div class="flex flex-col flex-grow">
                                        <p class="my-2 text-gray-600 text-sm font-normal overflow-hidden leading-6">
                                            {{ $article->description }}</p>
                                    </div>
                                    @if ($article->categories)
                                        <div class="mt-5 mb-2 cursor-default">
                                            @foreach ($article->categories as $cate)
                                                <a class="decoration-0"
                                                    href="{{ route('category.articles', $cate->slug) }}"><span
                                                        class="text-xs inline-block py-1 pr-2 text-center whitespace-nowrap duration-200 transition align-baseline hover:text-indigo-800">{{ $cate->title }}</span></a>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if ($article->tags)
                                        <div class="mb-2 cursor-default">
                                            @foreach ($article->tags as $tag)
                                                <a class="decoration-0"
                                                    href="{{ route('tag.articles', $tag->slug) }}"><span
                                                        class="text-xs inline-block py-1 px-2 text-center whitespace-nowrap duration-200 transition align-baseline bg-gray-100 hover:bg-gray-200 text-gray-900 rounded">#{{ $tag->slug }}</span></a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Pagination -->
                    <div class="mt-5">
                        {!! $articles->render() !!}
                    </div>

                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8 px-4 py-6 divide-gray-300 divide-y">
                    <div class="cursor-default">
                        <h3 class="mb-4 text-lg font-extrabold tracking-tight text-indigo-800">Latest Categories</h3>
                        @foreach ($categories as $category)
                            <a class="decoration-0" href="{{ route('category.articles', $category->slug) }}"><span
                                    class="text-xs inline-block pb-1 pr-2 text-center whitespace-nowrap duration-200 transition align-baseline hover:text-indigo-800">{{ $category->title }}</span></a>
                        @endforeach
                    </div>
                    <div class="mt-6 pt-6 cursor-default">
                        <h3 class="mb-4 text-lg font-extrabold tracking-tight text-indigo-800">Latest Tags</h3>
                        @foreach ($tags as $tag)
                            <a class="decoration-0" href="{{ route('tag.articles', $tag->slug) }}"><span
                                    class="text-xs inline-block py-1 px-2 text-center whitespace-nowrap duration-200 transition align-baseline bg-gray-100 hover:bg-gray-200 text-gray-900 rounded">#{{ $tag->slug }}</span></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
