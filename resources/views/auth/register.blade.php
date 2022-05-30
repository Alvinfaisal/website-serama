@extends('layouts.app-auth')
@section('title', 'Register')

@section('content')
    <div class="w-full flex flex-wrap">

        <!-- Register Section -->
        <div class="w-full md:w-1/3 flex flex-col">

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 ">

                <a href="{{ route('landing.index') }}">
                    <img class="mt-4 pt-4" src="{{ asset('frontend/images/content/logo-serama.svg') }}"
                        alt="Serama | Colloring your daily life with serama's" />
                </a>

                {{-- <p class="text-center mt-4">Register Page</p> --}}

                <form method="POST" action="{{ route('register') }}" class="flex flex-col pt-3 md:pt-3">

                    @csrf

                    <div class="flex flex-col pt-4">
                        <label for="name" class="text-lg">Name</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus
                            autocomplete="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="confirm-password" class="text-lg">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                    <button type="submit" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8"
                        style="background-color: #ECF39E" />
                    Register
                    </button>
                </form>

                <div class="text-center pt-12 pb-12">
                    <p>Already have an account? <a href="{{ route('login') }}" class="underline font-semibold">Log in
                            here.</a></p>
                </div>

                <x-jet-validation-errors class="mb-4" />
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-2/3 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="{{ asset('/assets/img/bg-register.png') }}"
                alt="Background" />
        </div>

    </div>

@endsection
