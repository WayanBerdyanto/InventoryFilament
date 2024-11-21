<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventory</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <span>Npm run Dev not active</span>
    @endif
</head>

<body>

    <div class="w-full p-5">
        <div
            class="mx-auto max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Hello, Welcome to Inventory Gober</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 ">
                Demo <br>
                email: admin@gmail.com <br>
                password: admin
            </p>
            <a href="/admin/login"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 ">
                Login Admin
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>

</body>

</html>
