<!DOCTYPE html>
<html class="no-js" lang="">

<head>

    {{-- include file meta --}}
    @include('includes.landing.meta')

    <title>@yield('title') | Serama's</title>

    {{-- untuk menambahkan file styling atau css sebelum file style master --}}
    @stack('before-style')

    {{-- include file style css --}}
    @include('includes.landing.style')

    {{-- untuk menambahkan file styling atau css sesudah file style master --}}
    @stack('after-style')

</head>

<body>
    <!-- Add your site or application content here -->

    {{-- include file navbar.blade.php --}}
    @include('components.landing.navbar')

    {{-- semua isi masuk kedalam section dengan nama content --}}
    @yield('content')

    {{-- include file footer.blade.php --}}
    @include('components.landing.footer')

    {{-- untuk menambahkan script js tambahan sebelum script master --}}
    @stack('before-script')

    {{-- include file javascript  script master --}}
    @include('includes.landing.script')

    {{-- untuk menambahkan script js tambahan sesudah script master --}}
    @stack('after-script')
</body>

</html>
