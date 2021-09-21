<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <form action="/post/store" method="POST" enctype="multipart/form-data">
                @csrf
                <header class="mt-8 lg:mt-0">
                    <div class="mt-4">
                        <label for="title"> Title </label>
                        <input type="text" name="title" id="title" placeholder="Blog Title" value="{{old('title')}}" required class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full" />

                        @error('title')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div class="mt-4">
                        <label for="title"> Slug </label>
                        <input type="text" name="slug" id="slug" placeholder="Blog Slug" value="{{old('slug')}}" required class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full" />

                        @error('slug')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </header>

                <div class="mt-4">
                    <p class="mt-4">
                        <label for="title"> Excerpt </label>
                        <input type="text" name="excerpt" id="excerpt" placeholder="Blog Excerpt" value="{{old('excerpt')}}" required class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full" />

                        @error('excerpt')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </p>

                    <p class="mt-4">
                        <label for="title"> Body </label>
                        <textarea name="body" id="body" required class="resize-y w-100 border rounded-md px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full">{{old('body')}}</textarea>

                        @error('body')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </p>

                    <p class="mt-4">
                        <label for="title"> Thumbnail </label>
                        <input type="file" name="thumbnail" id="thumbnail" class="border border-gray-400 p-2 w-full" required />

                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </p>
                </div>

                <button type="submit" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 mt-20"> Create Blog </button>

                <a href="/dashboard"
                    class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 ml-10"
                >Back</a>
            </form>
        </div>
    </div>
</x-app-layout>