<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="overflow-x-auto p-6">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-2xl font-mono text-gray-700">
            <thead class="bg-gradient-to-r from-blue-500 via-purple-500 to-red-500 text-white">
                <tr>
                    <th class="py-4 px-6 text-left rounded-tl-lg text-xl font-semibold">No</th>
                    <th class="py-4 px-6 text-center text-xl font-semibold">Grade Name</th>
                    <th class="py-4 px-6 text-center text-xl font-semibold">Department</th>
                    <th class="py-4 px-6 text-center text-xl font-semibold rounded-tr-lg">Students</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grades)
                    <tr class="bg-gray-50 hover:bg-blue-100 transition duration-300 ease-in-out transform hover:scale-105">
                        <td class="py-4 px-6 border-t border-gray-300 text-lg">{{ $grades->id }}</td>
                        <td class="py-4 px-6 text-center border-t border-gray-300 text-lg font-medium">{{ $grades->nama}}</td>
                        <td class="py-4 px-6 text-center border-t border-gray-300 text-lg font-medium">{{ $grades->department->description}}</td>
                        <td class="py-4 px-6 text-center border-t border-gray-300 text-lg font-light">
                            <ul class="space-y-1">
                                @foreach ($grades->students as $student)
                                    <li class="bg-gray-200 rounded px-2 py-1 inline-block hover:bg-gray-300 transition">{{ $student->nama }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
