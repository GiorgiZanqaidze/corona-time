<x-layout>
    <style>
        /* Scrollbar styles */
        ::-webkit-scrollbar {
        width: 6px;
        height: 12px;
        }

        ::-webkit-scrollbar-track {
        /* box-shadow: inset 0 0 10px #808189; */
        border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #808189; 
        box-shadow: inset 0 0 6px #808189; 
        }
    </style>
    <x-header infoType="{{__('messages.statistics_by_country')}}">
        <div>
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2 sm:m-5 sm:ml-0">
                <form method="GET" class="relative">

                    @if (request('sort_by')) 
                        <input type='hidden' name="sort_by" value="{{request('sort_by')}}" />
                    @endif

                    <input 
                    type="text" 
                     name="search"
                     value="{{request('search')}}"
                     placeholder="{{__('messages.search_by_country')}}"
                    class="pl-4 sm:pl-10 sm:p-3 shadow-sm bg-gray-50 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 block w-[90%] sm:w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark dark:shadow-sm-light text-[14px]"
                    >
                    <img src="{{asset('images/search.svg')}}" alt="search" class="absolute left-0 sm:left-5 top-[50%] translate-y-[-50%]">
                </form>
            </div>
            @if ($allCountry->count())
                <div class="relative h-96 overflow-y-scroll shadow-sm">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-light-gray border rounded-lg overflow-hidden relative">
                        <thead class="text-xs text-gray-700 uppercase bg-light-gray dark:bg-gray-700 dark:text-gray-400">
                            <tr>    
                                <th scope="col" class="py-2 sm:py-3 w-10 sm:pr-1 text-[8px] sm:text-[14px] sm:p-3 md:text-sm">
                                    <a href="?sort_by=name&{{http_build_query(request()->except('sort_by'))}}" class="flex items-center">
                                        <p class="inline">{{__('messages.location')}}</p>
                                        <div class="inline-block ml-1">
                                            <div class="flex flex-col">
                                                <div>
                                                    <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-up-fill.png')}}" class="w-2 sm:w-auto">
                                                </div>
                                                <div>
                                                    @if (request('sort_by') === 'name')
                                                    <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-fill-full.png')}}" class="w-2 sm:w-auto">
                                                        @else
                                                        <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-fill.png')}}" class="w-2 sm:w-auto">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </th>
                                <th scope="col" class="py-2 sm:py-3 sm:pr-1 text-[8px] sm:text-[14px] md:text-sm">
                                    <a href="?sort_by=confirmed&{{http_build_query(request()->except('sort_by'))}}" class="flex items-center">
                                        <p class="inline">{{__('messages.new_cases')}}</p>
                                        <div class="inline-block ml-1">
                                            <div class="flex flex-col">
                                                <div>
                                                    <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-up-fill.png')}}" class="w-2 sm:w-auto">
                                                </div>
                                                <div>
                                                    @if (request('sort_by') === 'confirmed')
                                                    <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-fill-full.png')}}" class="w-2 sm:w-auto">
                                                        @else
                                                        <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-fill.png')}}" class="w-2 sm:w-auto">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </th>
                                <th scope="col" class="py-2 sm:py-3 sm:pr-1 text-[8px] sm:text-[14px] md:text-sm">
                                    <a href="?sort_by=deaths&{{http_build_query(request()->except('sort_by'))}}" class="flex items-center">
                                        <p class="inline">{{__('messages.deaths')}}</p>
                                        <div class="inline-block ml-1">
                                            <div class="flex flex-col">
                                                <div>
                                                    <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-up-fill.png')}}" class="w-2 sm:w-auto">
                                                </div>
                                                <div>
                                                    @if (request('sort_by') === 'deaths')
                                                    <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-fill-full.png')}}" class="w-2 sm:w-auto">
                                                        @else
                                                        <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-fill.png')}}" class="w-2 sm:w-auto">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </th>
                                <th scope="col" class="py-2 sm:py-3 sm:pr-1 text-[8px] sm:text-[14px] md:text-sm" class="flex items-center">
                                    <a href="?sort_by=recovered&{{http_build_query(request()->except('sort_by'))}}">
                                        <p class="inline ">{{__('messages.recovered')}}</p>
                                        <div class="inline-block ml-1">
                                            <div class="flex flex-col">
                                                <div>
                                                    <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-up-fill.png')}}" class="w-2 sm:w-auto">
                                                </div>
                                                <div>
                                                    @if (request('sort_by') === 'recovered')
                                                    <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-fill-full.png')}}" class="w-2 sm:w-auto">
                                                        @else
                                                        <img src="{{asset('images/remix-icons-fill-system-arrow-drop-down-fill.png')}}" class="w-2 sm:w-auto">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-blue-500">
                            <tr class="bg-white border-b dark:bg-gray-800 border-light-gray">
                                <td class="py-4 sm:pr-10 sm:whitespace-nowrap text-[13px] sm:text-[14px] sm:p-3 md:text-sm">
                                    {{__('messages.Worldwide')}}
                                </td>
                                <td class="py-4">
                                    {{$confirmed}}
                                </td>
                                <td class="py-4">
                                    {{$deaths}}
                                </td>
                                <td class="py-4">
                                    {{$recovered}}
                                </td>
                            </tr>
                            @foreach ($allCountry as $country)
                                <tr class="bg-white border-b dark:bg-gray-800 border-light-gray">
                                    <td class="py-4 sm:pr-10 sm:whitespace-nowrap text-[13px] sm:text-[14px] sm:p-3 md:text-sm">
                                        {{$country->name}}
                                    </td>
                                    <td class="py-4">
                                        {{$country->confirmed}}
                                    </td>
                                    <td class="py-4">
                                        {{$country->deaths}}
                                    </td>
                                    <td class="py-4">
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