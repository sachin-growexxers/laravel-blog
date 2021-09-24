<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <form action="/profile/update/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center justify-center mt-8">
        @csrf
        @method('PUT')
        <div class="flex flex-col items-center justify-center bg-antiquewhite-300 p-10" style="background-color: antiquewhite;">

            <div class="mt-4 w-1/2">
                <div class="relative w-24 h-24">
                    <img class="rounded-full border border-gray-100 shadow-sm" src="{{ asset('storage/' .$user->user_thumbnail) ? asset('storage/' .$user->user_thumbnail) : asset('images/newavatar.jpg')  }}" alt="user image" />
                    <div class="absolute top-0 right-0 h-6 w-6 my-1 border-4 border-white rounded-full bg-green-400 z-2"></div>
                </div>
               
                <input type="file" name="user_thumbnail" />
                <input type="hidden" name="oldThumbnail" value="{{ $user->user_thumbnail }}" />

                @error('user_thumbnail')
                    <p class="text-red-300 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="title"> Name : </label> <br>
                <input type="text" name="name" placeholder="User name" value="{{ $user->name }}" required class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-80 mt-1" />

                @error('name')
                    <p class="text-red-300 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 mb-10">
                <label for="title"> Email : </label> <br>
                <input type="text" placeholder="User email" value="{{ $user->email }}" required class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-80 mt-1" readonly />
            </div>
            
            <div class="mt-4 mb-10">
                <button type="submit" onclick="return confirm('Are you sure you want to update?')" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 border border-indigo-600"
                >Update</button>

                <a href="/dashboard"
                    class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 border border-indigo-600 ml-5"
                >Back</a>
            </div>

            <div class="mt-4 mb-4">
                <span class=" text-gray-400 text-xs float-right">
                    This Account is created <time>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</time>. <br>
                    Note : You can update profile image and name only.
                </span>
            </div>
        </div>
    </form>
    <x-flash-session />
    
</x-app-layout>