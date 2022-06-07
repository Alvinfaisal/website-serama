@extends('layouts.app-dashboard')
@section('title', 'Edit Article')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Ubah Artikel
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <form method="post" action="{{ route('dashboard.articles.update', [$article->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" autocomplete="given-title"
                                    value="{{ $article->title }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('title')
                                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="2"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $article->description }}</textarea>
                                </div>
                                @error('description')
                                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mt-3">
                                <label for="categories"
                                    class="mb-1 block text-sm font-medium text-gray-700">Categories</label>
                                <select
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    name="categories[]" id="categories" multiple>
                                    @foreach (\App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}"
                                            {{ in_array($category->id, $article->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="body" class="block text-sm font-medium text-gray-700">
                                    Body
                                </label>
                                <div class="mt-1">
                                    <textarea id="body" name="body" rows="8"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $article->body }}</textarea>
                                </div>
                                @error('body')
                                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mt-3">
                                <label for="tags" class="mb-1 block text-sm font-medium text-gray-700">Tags</label>
                                <select
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    name="tags[]" id="tags" multiple>
                                    @foreach (\App\Models\Tag::all() as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            #{{ $tag->slug }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="flex mb-3">
                                    @foreach ($article->images['images'] as $key => $image)
                                        <div class="mr-4">
                                            <input type="radio"
                                                class="focus:ring-indigo-400 h-4 w-4 text-indigo-600 border-gray-300"
                                                name="imagesThumb" id="imagesThumb-{{ $key }}"
                                                value="{{ $image }}"
                                                {{ $article->images['thumb'] == $image ? 'checked' : '' }} />
                                            <label for="imagesThumb-{{ $key }}"
                                                class="ml-1 text-sm font-medium text-gray-700">
                                                @if ($key == 'original')
                                                    Original
                                                @else
                                                    {{ 'Width ' . $key . ' (px) ' }}
                                                @endif
                                            </label>

                                            <a href="{{ $image }}" target="_blank"><img src="{{ $image }}"
                                                    class="w-7 ml-1 ring-1 ring-gray-200 rounded-full h-auto float-right ml-1"></a>
                                        </div>
                                    @endforeach
                                </div>
                                <label class="block">
                                    <span class="sr-only">Choose Image</span>
                                    <input type="file" name="images" id="images"
                                        class="block focus:outline-none w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                </label>
                                @error('images')
                                    <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <p class="text-sm text-gray-700 mt-5 mb-3">Last Update : {{ $article->updated_at }}</p>

                            {{-- button save --}}
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3 text-right">
                                    <a href="{{ route('dashboard.articles.index') }}"
                                        class="shadow-lg bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded"
                                        onclick="return confirm('Yakin kembali?')">
                                        Kembali
                                    </a>
                                    <button type="submit"
                                        class=" shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Ubah artikel?')">
                                        Ubah Artikel
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

@push('before-style')
    {{-- select2 style --}}
    <link rel="stylesheet" href="{{ asset('css/app-admin.css') }}">
@endpush

@push('after-script')
    {{-- ckeditor script --}}
    <script src="{{ asset('js/app-admin.js') }}"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserImageUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}"
        });
        $('#categories').select2({});
        $('#tags').select2({});
    </script>
@endpush
