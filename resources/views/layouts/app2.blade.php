<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <main class="flex">
            <div class="flex flex-col justify-between w-1/4 h-screen bg-gray-500">
              {{-- <header class="bg-blue-300 py-4">
                Header
              </header> --}}
              @include('layouts.navigation')
              {{-- <footer class="mt-auto text-center bg-pink-300 py-4 text-sm">
                <span>&#169</span>Department of Agriculture Regional Office 5
              </footer> --}}
            </div>
            <div class="flex flex-col justify-between w-3/4 bg-red-400">
                {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div> --}}
              <section class="bg-purple-400">
                {{ $slot }}
              </section>
              <footer class="mt-auto text-center bg-pink-300 py-4 text-sm">
                <span>&copy;</span>Department of Agriculture Regional Office 5
              </footer>
            </div>
        </main>
    </body>
</html>
