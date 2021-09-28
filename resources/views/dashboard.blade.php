<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center float-right relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
        
            <div x-data="{show : false}" class="py-2 pl-3 pr-9 text-lg">

                <button @click="show = ! show">Categories</button>

                <div x-show="show" class="py-2 absolute bg-gray-300 rounded-xl w-32">
                    @foreach($categories as $category)
                        <a href="/category/{{ $category->id }}" class="block text-left px-3 text-sm leading-5 hover:bg-white">{{ $category->name }}</a>
                    @endforeach
                </div>

            </div>
            
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                <form method="GET" action="#">
                    <input type="text" name="search" placeholder="Find something"
                            class="bg-transparent placeholder-black font-semibold text-sm border border-black-900 bg-white px-4 py-2 rounded-xl">
                </form>
            </div>

            <div class="mt-8 md:mt-0">
                <a href="/post/create" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Create Blog
                </a>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <x-article :post="$post"/>
                @endforeach
            @else
            <article>
                <p class="text-lg text-center max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
                    No post yet, please check back later.
                </p>
            </article>
                
            @endif
            
            {{ $posts->links() }}
        </main>

        <x-flash-session />

        <x-footer />
    </section>
</x-app-layout>