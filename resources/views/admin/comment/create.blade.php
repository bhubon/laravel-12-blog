<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class=" text-gray-900">
                    <div class="p-8 bg-white rounded-lg">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Create tag</h2>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="mb-4">
                                <div class="text-sm text-red-600">
                                    @foreach ($errors as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif


                        <div class="overflow-x-hidden">
                            <form method="POST" action="{{ route('tags.store') }}" class="mt-6"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Title -->
                                <div class="mb-4">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span> </label>
                                    <input type="text" name="title" id="title"
                                        value="{{ old('title') }}" required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('title')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>



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
</x-app-layout>
