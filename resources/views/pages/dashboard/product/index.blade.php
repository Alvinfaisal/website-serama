@extends('layouts.app-admin')

@section('title', 'Product')
@section('content')

    <div class="container px-6 mx-auto grid">

        <h2 class="my-1 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Product
        </h2>

        <div class="py-6">
            <div class="mb-10">
                <a href="{{ route('dashboard.product.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Create Product
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6 table-responsive">
                    <table id="crudTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Aksi</th>
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
            processing: true,
            serverSide: true,
            responsive: false,
            lengthChange: true,
            pageLength: 10,
            destroy: true,
            bFilter: true,
            ajax: {
                url: '{!! url()->current() !!}',
                type: "GET"
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    width: '5%'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'price',
                    name: 'price'
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
