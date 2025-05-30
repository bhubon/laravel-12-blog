@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.css" />
@endpush
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class=" text-gray-900">
                    <div class="p-8 bg-white rounded-lg">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Create post</h2>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="mb-4">
                                <div class="text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif


                        <div class="overflow-x-hidden">
                            <form method="POST" action="{{ route('posts.store') }}" class="mt-6"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Title -->
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title <span
                                            class="text-red-500">*</span> </label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('title')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label for="last_name"
                                        class="block text-sm font-medium text-gray-700">Content</label>
                                    <textarea name="content" id="content" rows="4"
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Category -->
                                <div class="mb-4">
                                    <label for="categories"
                                        class="block text-sm font-medium text-gray-700">Category</label>
                                    <select name="categories[]" id="categories" multiple
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ in_array($category->id, old('category', [])) ? 'selected' : '' }}>
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Tags -->
                                <div class="mb-4">
                                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                                    <select name="tags[]" id="tags" multiple
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                                {{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Meta Title -->
                                <div class="mb-4">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Meta
                                        Title</label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        value="{{ old('meta_title') }}" required
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @error('meta_title')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Meta
                                        Description</label>
                                    <textarea name="meta_description" id="meta_description"
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>



                                <!-- Image -->
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                    <div class="flex items-center justify-center p-4">
                                        <img class="w-96 h-72 object-cover rounded-3xl image-preview"
                                            src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}" alt="">
                                    </div>
                                    <input name="image" type="file"
                                        class="image-upload-input px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="">
                                    @error('image')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- status -->
                                <div class="mb-4">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status"
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($status as $statusKey => $statusValue)
                                            <option value="{{ $statusValue }}"
                                                {{ old('status') == $statusValue ? 'selected' : '' }}>
                                                {{ $statusValue->label() }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="flex items-center justify-end mt-6">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        Create Post
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    @include('components.image-placeholder-script');
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect('#categories', {
                create: false,
                placeholder: 'Select categories',
                onItemAdd: function(value, item) {
                    console.log('Item added:', value);
                },
                onItemRemove: function(value) {
                    console.log('Item removed:', value);
                }
            });
            new TomSelect('#tags', {
                create: false,
                placeholder: 'Select tags',
                onItemAdd: function(value, item) {
                    console.log('Item added:', value);
                },
                onItemRemove: function(value) {
                    console.log('Item removed:', value);
                }
            });


            // ckeditor
            ClassicEditor
                .create(document.querySelector('#content'),)
                .catch(error => {
                    console.error(error);
                });


        });
    </script>
