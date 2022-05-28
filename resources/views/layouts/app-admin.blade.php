<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>

    {{-- include file meta --}}
    @include('includes.dashboard.meta')
    <title>@yield('title') - Serama </title>

    {{-- untuk menambahkan file styling atau css sebelum file style master --}}
    @stack('before-style')

    {{-- include file style css --}}
    @include('includes.dashboard.style')

    {{-- untuk menambahkan file styling atau css sesudah file style master --}}
    @stack('after-style')



</head>

<body class="font-sans antialiased">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{-- include component sidebar desktop version --}}
        @include('components.dashboard.desktop')

        {{-- include component sidebar mobile version --}}
        @include('components.dashboard.mobile')

        <div class="flex flex-col flex-1 w-full">

            {{-- include components header --}}
            @include('components.dashboard.header')

            <main class="h-full pb-16 overflow-y-auto">
                {{-- untuk memasukkan konten secara dinamis --}}
                @yield('content')
            </main>
        </div>

    </div>

    {{-- untuk menambahkan script js tambahan sebelum script master --}}
    @stack('before-script')

    {{-- include file javascript  script master --}}
    @include('includes.dashboard.script')

    {{-- untuk menambahkan script js tambahan sesudah script master --}}
    @stack('after-script')

</body>

</html>
