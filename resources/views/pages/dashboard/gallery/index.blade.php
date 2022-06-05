@extends('layouts.app-dashboard')
@section('title', 'Gallery')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-2 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Product &raquo; {{ $product->name }} &raquo; Gallery
        </h2>

        <div class="py-6">
            <div class="mb-10">
                <a href="{{ route('dashboard.product.gallery.create', $product->id) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Upload Photos
                </a>
                <a href="{{ route('dashboard.product.index') }}"
                    class="shadow-lg bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded"
                    onclick="return confirm('Yakin kembali?')">
                    Kembali
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="px-2 py-4">ID</th>
                                <th class="px-6 py-4">Photo</th>
                                <th class="px-6 py-4">Featured</th>
                                <th class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    width: '5%'
                },
                {
                    data: 'url',
                    name: 'url'
                },
                {
                    data: 'is_featured',
                    name: 'is_featured'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '25%'
                },
            ],
        });
    </script>
@endpush
