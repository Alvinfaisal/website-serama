@extends('layouts.app-dashboard')
@section('title', 'Ubah Kategori')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Ubah Kategori
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <form method="post" action="{{ route('dashboard.categories.update', [$category->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" autocomplete="given-title"
                                    value="{{ $category->title }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('title')
                                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <p class="text-sm text-gray-700 mt-5 mb-3">Last Update : {{ $category->updated_at }}</p>
                            {{-- button save --}}
                            <div class="flex flex-wrap pt-4 -mx-3 mb-6">
                                <div class="w-full px-3 text-right">
                                    <a href="{{ route('dashboard.categories.index') }}"
                                        class="shadow-lg bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded"
                                        onclick="return confirm('Yakin kembali?')">
                                        Kembali
                                    </a>
                                    <button type="submit"
                                        class=" shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Ubah kategori?')">
                                        Simpan
                                    </button>
                                </div>
                            </div>


                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
