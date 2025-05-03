<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categoreis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class=" text-gray-900">
                    <div class="p-8 bg-white rounded-lg">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Categories</h2>
                            </div>
                            <a href="{{ route('categories.create') }}"
                                class="px-4 py-2 text-white bg-violet-600 hover:bg-violet-700 rounded-lg text-sm font-medium">Add
                                category</a>
                        </div>

                        <div class="overflow-x-auto">

                            @if ($categories->isEmpty())
                                <div class="text-center py-4">
                                    <p class="text-gray-500">No category found.</p>
                                </div>
                            @else
                                <table
                                    class="min-w-full table-auto border-separate border-spacing-y-2">
                                    <thead class="text-left text-sm font-semibold text-gray-500">
                                        <tr>
                                            <th class="py-2">ID</th>
                                            <th class="py-2">Title</th>
                                            <th class="py-2">Slug</th>
                                            <th class="py-2">Thumbnail</th>
                                            <th class="py-2">Created At</th>
                                            <th class="py-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm text-gray-700">
                                        @foreach ($categories as $category)
                                            <tr class="bg-white rounded-md shadow-sm">
                                                <td class=" py-2">{{ $category->id }}</td>
                                                <td class=" py-2 font-medium text-gray-900">{{ $category->title }}</td>
                                                <td class=" py-2 ">{{ $category->slug }}</td>
                                                <td class=" py-2">
                                                    <img src="{{ asset($category->image_url) }}" class="w-16 h-16 object-cover rounded-md"
                                                        alt="{{ $category->title }}">
                                                </td>
                                                <td class=" py-2">{{ $category->created_at->format('H:i d M, Y') }}</td>
                                                <td
                                                    class=" py-2 text-violet-600 font-medium cursor-pointer hover:underline">
                                                    <div class="flex gap-2">
                                                        <a href="{{ route('categories.edit', $category) }}">Edit</a>
                                                        <form action="{{ route('categories.destroy',$category) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-red-600" onclick="return confirm('Are you sure to delete?');">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                <div class="mt-4">
                                    {{ $categories->links() }}
                                </div>

                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
