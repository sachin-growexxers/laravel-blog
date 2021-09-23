<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <form action="/profile/update/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center justify-center mt-8">
        @csrf
        @method('PUT')
        <div class="flex flex-col items-center justify-center bg-antiquewhite-300" style="background-color: antiquewhite;">

            <div class="flex-1 flex flex-col justify-between items-center">
                <div class="mt-4 w-1/2">
                    <header class="mt-8 lg:mt-0 items-center">
                    <img src="{{ asset('images/newavatar.jpg') }}" alt="Blog Post illustration" class="rounded-xl">
                    <input type="file" name="user_thumbnail" class="px-10"/>
                </div>
                    <div class="mt-4">
                        <label for="title"> Name : </label> <br>
                        <input type="text" placeholder="User name" value="{{ $user->name }}" required class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-80 mt-1" />
                    </div>

                    <div class="mt-4 mb-10">
                        <label for="title"> Email : </label> <br>
                        <input type="text" placeholder="User email" value="{{ $user->email }}" required class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-80 mt-1" readonly />
                    </div>
                    
                    <div class="mt-4 mb-10">
                        <a href="profile/update/{{ $user->id }}"
                        onclick="return confirm('Are you sure you want to update?')" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 border border-indigo-600"
                        >Update</a>

                        <a href="/dashboard"
                            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 border border-indigo-600 ml-5"
                        >Back</a>
                    </div>

                </header>

            </div>
            <div class="mt-4 mb-4">
                <span class=" text-gray-400 text-xs float-right">
                    This Account is created <time>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</time>. <br>
                    Note : You can update profile image and name only.
                </span>
            </div>
        </div>
        
    </form>
    
</x-app-layout>