<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center float-right">
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                
            </div>

            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="#">
                    <input type="text" name="search" placeholder="Find something"
                            class="mb-5 bg-transparent placeholder-black font-semibold text-sm border border-black-900 bg-white px-4 py-2 rounded-xl">
                </form>
            </div>

            <div class="mt-8 md:mt-0 mb-5">
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
