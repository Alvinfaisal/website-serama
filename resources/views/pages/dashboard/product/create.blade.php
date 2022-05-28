@extends('layouts.app-admin')

@section('title', 'Create')

@section('content')

    <div class="container px-6 mx-auto grid">

        <h2 class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create product
        </h2>

        <div class="py-6">

            {{-- untuk pemberitahuan validasi error saat mengisi form --}}
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Form tambah produk --}}

            <form class="w-full" action="{{ route('dashboard.product.store') }}" method="post"
                enctype="multipart/form-data">

                {{-- token csrf --}}
                @csrf

                {{-- form input name --}}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Name
                        </label>
                        <input value="{{ old('name') }}" name="name"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" placeholder="Product Name">
                    </div>
                </div>

                {{-- form input description --}}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Description
                        </label>
                        <textarea name="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text"
                            placeholder="Product Description">{{ old('description') }}</textarea>
                    </div>
                </div>

                {{-- form input price --}}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Price
                        </label>
                        <input value="{{ old('price') }}" name="price"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="number" placeholder="Product Price">
                    </div>
                </div>

                {{-- button save --}}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 text-right">
                        <a href="{{ route('dashboard.product.index') }}"
                            class="shadow-lg bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded"
                            onclick="return confirm('Yakin kembali?')">
                            Kembali
                        </a>
                        <button type="submit"
                            class=" shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                            onclick="return confirm('Simpan data produk?')">
                            Save Product
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>

@endsection

@push('after-script')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
