<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <table class="min-w-full bg-white border-rounded border-gray-200 rounded-lg shadow-lg font-mono">
        <thead class="bg-gradient-to-r from-blue-300 to-purple-400 text-white rounded-t-lg">
            <tr>
                <th class="py-4 px-6 text-left rounded-tl-lg text-xl font-semibold">Id</th>
                <th class="py-4 px-6 text-center text-xl font-semibold">Nama</th>
                <th class="py-4 px-6 text-center text-xl font-semibold rounded-tr-lg">Description</th>
            </tr>
        </thead>
        <tbody class="rounded-b-lg">
            @foreach ($departments as $departments )


            <tr class="bg-gray-50 hover:bg-blue-100 transition-colors duration-200">
                <td class="py-3 px-5 border-t">{{$departments->id}}</td>
                <td class="py-3 px-5 border-t">{{$departments->name}}</td>
                <td class="py-3 px-5 border-t">{{$departments->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
