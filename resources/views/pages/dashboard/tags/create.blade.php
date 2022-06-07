@extends('layouts.app-dashboard')
@section('title', 'Tambah Tag')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tambah Tag
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <form action="{{ route('dashboard.tags.store') }}" method="post">
                            @csrf
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" autocomplete="given-title"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('title')
                                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- button save --}}
                            <div class="flex flex-wrap pt-4 -mx-3 mb-6">
                                <div class="w-full px-3 text-right">
                                    <a href="{{ route('dashboard.tags.index') }}"
                                        class="shadow-lg bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded"
                                        onclick="return confirm('Yakin kembali?')">
                                        Kembali
                                    </a>
                                    <button type="submit"
                                        class=" shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Simpan tags?')">
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
