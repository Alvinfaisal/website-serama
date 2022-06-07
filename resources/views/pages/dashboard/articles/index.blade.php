@extends('layouts.app-dashboard')
@section('title', 'Article')

@section('content')
    <div class="container px-6 mx-auto grid">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Artikel
        </h2>


        <div class="py-6">
            <div class="mb-10">
                <a href="{{ route('dashboard.articles.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Artikel
                </a>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-4 bg-white border-b border-gray-200">
                            @foreach ($articles as $article)
                                <div
                                    class="flex items-center justify-between p-2 hover:bg-gray-50 transform transition duration-100">
                                    <h1 class="text-base text-indigo-800 font-bold"> {{ $article->title }}</h1>
                                    <div class="flex">
                                        <a href="{{ route('dashboard.articles.edit', $article->id) }}"
                                            class="inline-flex items-center transform transition duration-200 text-sm justify-center px-3 py-1 border border-transparent rounded-md text-indigo-800 bg-indigo-100 hover:bg-indigo-200">Edit</a>
                                        <form action="{{ route('dashboard.articles.destroy', $article->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="inline-flex items-center text-sm justify-center px-3 py-1 transform transition duration-200 border border-transparent rounded-md text-gray-900 bg-gray-200 hover:bg-gray-300 ml-2">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Pagination -->
                        <div class="p-2">
                            {!! $articles->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
