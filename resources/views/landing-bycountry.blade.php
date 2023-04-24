<x-layout>
    <x-header infoType="{{__('messages.statistics_by_country')}}">
        <div>
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="/landing-bycountry" class="relative">
                    <input 
                    type="text" 
                     name="search"
                     placeholder="{{__('messages.search_by_country')}}"
                    class="pl-10 border-2 p-3 shadow-sm bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark dark:shadow-sm-light"
                    >
                    <img src="{{asset('images/search.svg')}}" alt="search" class="absolute left-5 top-[50%] translate-y-[-50%]">
                </form>
            </div>
            <div class="h-32 bg-blue-500 overflow-scroll">
                @foreach ($allCountry as $country)
                    <h1>{{$country->name}}</h1>
                @endforeach
            </div>
        </div>
    </x-header>
</x-layout>