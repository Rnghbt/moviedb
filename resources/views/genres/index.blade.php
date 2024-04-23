<x-admin-layout>
    <div class="flex justify-between">
        <h2>Genres</h2>
        <a href="{{ route('genres.create') }}" class="py-2 px-4 bg-yellow-400 hover:bg-yellow-500 rounded-lg text-sm">Add
            Genre</a>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-neutral-200">
                        <thead>
                            <tr class="text-neutral-500">
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Genre</th>
                                <th class="px-5 py-3 text-xs font-medium text-right uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-200">
                            @foreach ($genres as $genre)
                                <tr class="text-neutral-800">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                    {{$genre->name}}
                                    </td>
                                    <td class="px-5 py-4 text-sm space-x-2 font-medium text-right whitespace-nowrap">
                                        <div class="flex justify-end gap-2">
                                            <a class="text-blue-500 hover:text-blue-700"
                                                href="{{ route('genres.edit', $genre->id) }}">Edit</a>
                                            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button class="text-red-500 hover:text-red-700"
                                                    href="">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
