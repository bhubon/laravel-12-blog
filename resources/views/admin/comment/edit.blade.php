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
                                <h2 class="text-xl font-semibold text-gray-800">Edit comment</h2>
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
                            <form method="POST" action="{{ route('comments.update', $comment) }}" class="mt-6"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Comment -->
                                <div class="mb-4">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Comment
                                        <span class="text-red-500">*</span> </label>
                                    <textarea name="content" id="content"
                                        class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                       >{{ old('content', $comment->content) }}</textarea>
                                    @error('content')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="" class="block text-sm font-medium text-gray-700">Post :</label>
                                    <a href="{{ route('posts.edit', $comment->post) }}" class="text-indigo-600 hover:text-indigo-500">{{ $comment->post->title }}</a>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="block text-sm font-medium text-gray-700">User :</label>
                                    <a href="{{ route('users.edit', $comment->user) }}" class="text-indigo-600 hover:text-indigo-500">{{ $comment->user->name }}</a>
                                </div>



                                <!-- Submit Button -->
                                <div class="flex items-center justify-end mt-6">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        Update Comment
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
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        // ckeditor
        ClassicEditor
            .create(document.querySelector('#content'), )
            .catch(error => {
                console.error(error);
            });
    </script>
