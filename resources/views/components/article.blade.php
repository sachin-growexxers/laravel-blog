<article class="transition-colors duration-300 hover:bg-gray-300 border border-black border-gray-300 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="/post/edit/{{ $post->id }}"
                        class="px-3 py-1 border border-black rounded-full text-white text-xs uppercase font-semibold bg-green-500 hover:text-black hover:bg-white"
                        style="font-size: 10px">Update Blog</a>

                    <a href="/post/destroy/{{ $post->id }}"
                        class="px-3 py-1 border border-black rounded-full text-white text-xs uppercase font-semibold bg-red-500 hover:text-black hover:bg-white" onclick="return confirm('Are you sure you want to delete this blog?')"
                        style="font-size: 10px">Delete Blog</a>
                </div>

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
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                </div>

                <div class="lg:block">
                    <a href="/post/show/{{ $post->id }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-white-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>