<!-- Scripts -->
{{-- ini script js bawaan defautl laravel --}}
{{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}

<!--- Tambahkan setelah app.js --->
{{-- script datatables --}}
<script type="text/javascript" src="{{ url('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js') }}"></script>



{{-- script dashboard template from windmill-dashboard --}}
<script defer src="{{ url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js') }}" defer></script>
<script src="{{ asset('/assets/js/init-alpine.js') }}"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js') }}" defer></script>
<script src="{{ asset('/assets/js/charts-lines.js') }}" defer></script>
<script src="{{ asset('/assets/js/charts-pie.js') }}" defer></script>
