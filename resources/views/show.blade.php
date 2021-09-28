<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="mt-4">
                        <h1 class="text-3xl">
                            {{ $post->title }}
                        </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $post->body }}
                </p>

                <p class="mt-4">
                    {{ $post->excerpt }}
                </p>

                <p class="mt-4">
                    <label for="title"> Category </label>
                    <select disabled="true" name="category_id" class="ml-2 form-input p-1 px-1 py-1 mb-5 rounded-xl w-19">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : ''}}> {{ $category->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>

            <section class="mt-5 space-y-10"> 
                
            </section>
            <footer class="flex justify-between items-center mt-8">
                <div class="lg:block">
                    <a href="/dashboard"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Back</a>
                </div>
            </footer>
        </div>
    </div>
</x-app-layout>