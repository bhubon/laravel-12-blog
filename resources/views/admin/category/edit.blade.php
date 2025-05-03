<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class=" text-gray-900">
                    <div class="p-8 bg-white rounded-lg">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Edit category</h2>
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
                            <form method="POST" action="{{ route('categories.update',$category) }}" class="mt-6"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title -->
                                <div class="mb-4">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span> </label>
                                    <input type="text" name="title" id="title"
                                        value="{{ old('title',$category->title) }}" required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('title')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="description" rows="4"
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description',$category->description) }}</textarea>
                                    @error('description')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Meta Title -->
                                <div class="mb-4">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        value="{{ old('meta_title',$category->meta_title) }}" required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('meta_title')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" rows="4"
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('meta_description',$category->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>



                                <!-- Image -->
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                    <div class="flex items-center justify-center p-4">
                                        <img class="w-96 h-72 object-cover rounded-3xl image-preview"
                                            src="{{ asset($category->image_url) }}" alt="{{ $category->title }}">
                                    </div>
                                    <input name="image" type="file"
                                        class="image-upload-input px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="">
                                    @error('image')
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
    @push('scripts')
        @include('components.image-placeholder-script');
    @endpush
</x-app-layout>
