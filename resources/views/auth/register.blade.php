@extends('layouts.app-auth')
@section('title', 'Register')
@section('content')
    <div class="w-full flex flex-wrap">

        <!-- Register Section -->
        <div class="w-full md:w-3/5 flex flex-col m-auto">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
                <a class="text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('landing.index') }}">
                    <img class="px-6" src="{{ asset('frontend/images/content/logo-serama.svg') }}"
                        alt="Serama | Colloring your daily life with serama's" />
                </a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">

                <p class="text-center text-2xl mt-6">Register Page</p>

                <form method="POST" action="{{ route('register') }}" class="flex flex-col pt-3 md:pt-8">

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
        <div class="w-2/5 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="{{ asset('/assets/img/bgt.png') }}"
                alt="Background" />
        </div>

    </div>

@endsection
