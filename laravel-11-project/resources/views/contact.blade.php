<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    <div class="p-6 bg-gray-900 text-white rounded-lg shadow-xl max-w-md mx-auto my-8">
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $title }}</h1>

        <div class="space-y-4 text-lg">
            <p><span class="font-semibold">Nama:</span> {{ $nama }}</p>
            <p><span class="font-semibold">Kelas:</span> {{ $kelas }}</p>

            <div class="flex items-center space-x-4 mt-4">
                <span class="font-semibold">LinkedIn:</span>
                <a href="https://www.linkedin.com/in/muhammad-azzam-aqila-daffa-51a5132b2/" target="_blank">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-300 ease-out">
                        {{ $linkedIn }}
                    </button>
                </a>
            </div>

            <div class="flex items-center space-x-4 mt-4">
                <span class="font-semibold">GitHub:</span>
                <a href="https://github.com/azmx" target="_blank">
                    <button class="px-4 py-2 bg-gray-800 text-white rounded-lg shadow-lg hover:bg-gray-700 transform hover:scale-105 transition-all duration-300 ease-out">
                        {{ $github }}
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-layout>
