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
                                <h2 class="text-xl font-semibold text-gray-800">Create user</h2>
                            </div>
                        </div>

                        <div class="overflow-x-hidden">
                            <form method="POST" action="{{ route('users.store') }}" class="mt-6" enctype="multipart/form-data">
                                @csrf

                                <!-- First Name -->
                                <div class="mb-4">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                        Name</label>
                                    <input type="text" name="first_name" id="first_name"
                                        value="{{ old('first_name') }}" required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('first_name')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Last Name -->
                                <div class="mb-4">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                        Name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                                        required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('last_name')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('email')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password"
                                        class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="password" name="password" id="password" required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('password')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- role -->
                                <div class="mb-4">
                                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                    <select name="role" id="role" required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->value }}"
                                                {{ old('role') == $role->value ? 'selected' : '' }}>
                                                {{ $role->label() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                    <div class="flex items-center justify-center p-4">
                                        <img class="w-96 h-72 object-cover rounded-3xl"
                                            src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}" alt="">
                                    </div>
                                    <input name="image" type="file"
                                    class="image-upload-input px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    placeholder="">
                                    @error('image')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror

                                <!-- Submit Button -->
                                <div class="flex items-center justify-end mt-6">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        Create User
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    @include('components.image-placeholder-script');
    @endpush
</x-app-layout>
