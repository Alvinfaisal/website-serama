<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
    {{-- include file meta --}}
    @include('includes.auth.meta')

    <title> @yield('title') - Serama</title>

    {{-- untuk menambahkan file styling atau css sebelum file style master --}}
    @stack('before-style')

    {{-- include file style css --}}
    @include('includes.auth.style')

    {{-- untuk menambahkan file styling atau css sesudah file style master --}}
    @stack('after-style')

    {{-- untuk menambahkan script js tambahan sebelum script master --}}
    @stack('before-script')

    {{-- include file javascript  script master --}}
    @include('includes.auth.script')

    {{-- untuk menambahkan script js tambahan sesudah script master --}}
    @stack('after-script')

</head>

<body>
    <div class="bg-white font-family-karla h-screen">
        @yield('content')
    </div>
</body>

</html>
