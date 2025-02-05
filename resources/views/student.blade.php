<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border-rounded border-gray-200 rounded-lg shadow-lg font-mono">
            <thead class="bg-gradient-to-r from-blue-300 to-purple-400 text-white rounded-t-lg">
                <tr>
                    <th class="py-4 px-6 text-left rounded-tl-lg text-xl font-semibold">No</th>
                    <th class="py-4 px-6 text-center text-xl font-semibold">Nama</th>
                    <th class="py-4 px-6 text-center text-xl font-semibold">Grades</th>
                    <th class="py-4 px-6 text-center text-xl font-semibold">Department</th>
                    <th class="py-4 px-6 text-center text-xl font-semibold">Email</th>
                    <th class="py-4 px-6 text-center text-xl font-semibold rounded-tr-lg">Alamat</th>
                </tr>
            </thead>
            <tbody class="rounded-b-lg">
                @foreach ($students as $student)
                    <tr class="bg-gray-50 hover:bg-blue-100 transition-colors duration-200">
                        <td class="py-3 px-5 border-t">{{ $student->id }}</td>
                        <td class="py-3 px-5 border-t">{{ $student->nama }}</td>
                        <td class="py-3 px-5 border-t">{{ $student->grade->nama }}</td>
                        <td class="py-3 px-5 border-t">{{ $student->grade->department->name }}</td>
                        <td class="py-3 px-5 border-t">{{ $student->email }}</td>
                        <td class="py-3 px-5 border-t">{{ $student->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
