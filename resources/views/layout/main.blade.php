<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Saya')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="bg-blue-500 text-white font-sans uppercase">
        <div class="mx-auto max-w-screen-xl p-3 flex justify-between">
            <div class="flex flex-col justify-center font-black text-2xl">PESDESIS & PESDEKA</div>
            <div class="flex">
                <img src="{{ asset('images/smansade.png') }}" class="w-14 h-auto">
                <img src="{{ asset('images/mpk.png') }}" class="w-14 h-auto">
                <img src="{{ asset('images/osis.png') }}" class="w-14 h-auto">
            </div>
        </div>
    </div>
    <div class="shadow-xl bg-white">
        <div class="mx-auto max-w-screen-xl p-3 flex justify-end">
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-black sm:mt-0 gap-5">
                <li>
                    <a href="{{ route('logout') }}" class="hover:underline">Logout</a>
                </li>
                <li>
                    <a href="/admin" class="hover:underline">Admin</a>
                </li>
            </ul>
        </div>
    </div>
    <main class="mx-auto max-w-screen-xl">
        @yield('content')
    </main>
    
    <footer class="mt-10 mb-10 flex justify-center">
        <span class="text-sm text-black sm:text-center font-thin font-sans">© 2025 MPK SMANSADE</a>. All Rights Reserved.
    </footer>
    @stack('scripts')
</body>
</html>
