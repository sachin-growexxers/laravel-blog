@if(Session()->has('flash'))
    <div class="py-12" x-data="{ show : true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-7 right-7 text-sm font-semibold">
                    {{ Session::get('flash') }}
                </div>
            </div>
        </div>
    </div>
@endif