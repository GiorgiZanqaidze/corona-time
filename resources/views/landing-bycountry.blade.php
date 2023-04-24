<x-layout>
    <x-header infoType="{{__('messages.statistics_by_country')}}">
        <div>
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" class="relative">

                    @if (request('sort_by')) 
                        <input type='hidden' name="sort_by" value="{{request('sort_by')}}" />
                    @endif

                    <input 
                    type="text" 
                     name="search"
                     value="{{request('search')}}"
                     placeholder="{{__('messages.search_by_country')}}"
                    class="pl-10 border-2 p-3 shadow-sm bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark dark:shadow-sm-light"
                    >
                    <img src="{{asset('images/search.svg')}}" alt="search" class="absolute left-5 top-[50%] translate-y-[-50%]">
                </form>
                
            </div>
            @if ($allCountry->count())
            <div class="relative h-96 bg-blue-500 overflow-scroll">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-light-gray border rounded-lg overflow-hidden relative">
                            <thead class="text-xs text-gray-700 uppercase bg-light-gray dark:bg-gray-700 dark:text-gray-400">
                                <tr>    
                                    <th scope="col" class="px-6 py-3">
                                        <a href="?sort_by=name&{{http_build_query(request()->except('sort_by'))}}">{{__('messages.location')}}</a>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <a href="?sort_by=confirmed&{{http_build_query(request()->except('sort_by'))}}">{{__('messages.new_cases')}}</a>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <a href="?sort_by=deaths&{{http_build_query(request()->except('sort_by'))}}">{{__('messages.deaths')}}</a>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <a href="?sort_by=recovered&{{http_build_query(request()->except('sort_by'))}}">{{__('messages.recovered')}}</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-blue-500">
                                @foreach ($allCountry as $country)
                                    <tr class="bg-white border-b dark:bg-gray-800 border-light-gray">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$country->name}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$country->confirmed}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$country->deaths}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$country->recovered}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            @endif
        </div>
    </x-header>
</x-layout>