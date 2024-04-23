<x-admin-layout>
    <div class="flex justify-between">
        <h2>Create Genre</h2>
    </div>

    <form class="space-y-3 max-w-sm" action="{{ route('genres.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="">
            <x-input-label>Genre</x-input-label>
            <x-text-input class="w-full" name="name" placeholder="genre" />
        </div>
        <div class="flex justify-end">
            <button class="py-2 px-4 bg-yellow-400 hover:bg-yellow-500 rounded-lg text-sm">Add Genre</button>
        </div>
    </form>
</x-admin-layout>
