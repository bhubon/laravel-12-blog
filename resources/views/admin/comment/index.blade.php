<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class=" text-gray-900">
                    <div class="p-8 bg-white rounded-lg">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Comments</h2>
                            </div>
                        </div>

                        <div class="overflow-x-auto">

                            @if ($comments->isEmpty())
                                <div class="text-center py-4">
                                    <p class="text-gray-500">No comments found.</p>
                                </div>
                            @else
                                <table
                                    class="min-w-full table-auto border-separate border-spacing-y-2">
                                    <thead class="text-left text-sm font-semibold text-gray-500">
                                        <tr>
                                            <th class="py-2">ID</th>
                                            <th class="py-2">Post Title</th>
                                            <th class="py-2">Commnet</th>
                                            <th class="py-2">Comment Author</th>
                                            <th class="py-2">Created At</th>
                                            <th class="py-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm text-gray-700">
                                        @foreach ($comments as $comment)
                                            <tr class="bg-white rounded-md shadow-sm">
                                                <td class=" py-2">{{ $comment->id }}</td>
                                                <td class=" py-2 font-medium text-gray-900">
                                                    <a href="{{ route('posts.edit', $comment->post) }}"
                                                        class="text-indigo-600 hover:underline">
                                                        {{ $comment->post->title }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="max-w-xs overflow-hidden text-ellipsis">
                                                        {!!  Str::limit($comment->content, 50, '...') !!}
                                                    </div>
                                                </td>
                                                <td class=" py-2 ">
                                                    <a href="{{ route('users.edit', $comment->user) }}"
                                                        class="text-indigo-600 hover:underline">
                                                        {{ $comment->user->name }}
                                                    </a>
                                                </td>
                                                <td class=" py-2">{{ $comment->created_at->format('H:i d M, Y') }}</td>
                                                <td
                                                    class=" py-2 text-violet-600 font-medium cursor-pointer hover:underline">
                                                    <div class="flex gap-2">
                                                        <a href="{{ route('comments.edit', $comment) }}">Edit</a>
                                                        <form action="{{ route('comments.destroy',$comment) }}" method="POST">
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
                                    {{ $comments->links() }}
                                </div>

                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
