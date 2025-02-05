<!DOCTYPE html class="h-full bg-gray-100">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    {{-- font --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{-- alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full">
        <x-admin-navbar />
        <x-admin-sidebar />
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="p-16">
            {{$slot}}
            </div>
        </main>
    </div>
</body>
</html>
