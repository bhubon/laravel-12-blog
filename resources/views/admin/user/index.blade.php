<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class=" text-gray-900">
                    <div class="p-8 bg-white rounded-lg">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Users</h2>
                            </div>
                            <a href="{{ route('users.create') }}"
                                class="px-4 py-2 text-white bg-violet-600 hover:bg-violet-700 rounded-lg text-sm font-medium">Add
                                user</a>
                        </div>

                        <div class="overflow-x-auto">

                            @if ($users->isEmpty())
                                <div class="text-center py-4">
                                    <p class="text-gray-500">No users found.</p>
                                </div>
                            @else
                                <table
                                    class="min-w-full table-auto border-separate border-spacing-y-2 border-separate-gray-600">
                                    <thead class="text-left text-sm font-semibold text-gray-500">
                                        <tr>
                                            <th class="py-2">Name</th>
                                            <th class="py-2">Email</th>
                                            <th class="py-2">Phone</th>
                                            <th class="py-2">Role</th>
                                            <th class="py-2"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm text-gray-700">
                                        @foreach ($users as $user)
                                            <tr class="bg-white rounded-md shadow-sm ">
                                                <td class=" py-2 font-medium text-gray-900">{{ $user->name }}</td>
                                                <td class=" py-2 ">{{ $user->email }}</td>
                                                <td class=" py-2">{{ $user->phone }}</td>
                                                <td class=" py-2">{{ $user->role->label() }}</td>
                                                <td
                                                    class=" py-2 text-violet-600 font-medium cursor-pointer hover:underline">
                                                    <div class="flex gap-2">
                                                        <a href="{{ route('users.edit', $user) }}">Edit</a>
                                                        <form action="{{ route('users.destroy',$user) }}" method="POST">
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
                                    {{ $users->links() }}
                                </div>

                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
