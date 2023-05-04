@props(['infoType'])

<div class="sm:mx-10 my-5 flex flex-col gap-5">
    <header class="px-5 sm:px-0">
        <nav class="bg-white border-gray-200 dark:bg-gray-800">
            <div class="flex justify-between w-full">
                <img src="{{asset('images/Group 1@2x.png')}}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <div class="flex" id="mobile-menu-2 bg-dark">
                    <div class="hidden sm:block sm:flex gap-5">
                        <div>
                            @include('components.lang-dropdown')
                        </div>
                        <div>
                            <p class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 bold">{{ucwords(auth()->user()->username)}}</p>
                        </div>
                        <div>
                            <form action="/logout" method="POST">
                            @csrf
                            <button class="text-center text-center">{{__('messages.logout')}}<button>
                            </form>
                        </div>
                    </div>
                    <div class="flex gap-5 sm:hidden">
                        @include('components.lang-dropdown')
                        <div x-data="{ open: false }" @click.away="open = false" class="relative">
                            <button @click="open = !open"><img src="{{asset('images/remix-icons-line-system-Group.png')}}" alt="arrow" class="text-sm inline"></button>
                            <div x-show="open" class="absolute right-0 flex flex-col gap-2 mt-2 justify-items-start bg-light-gray px-5">
                                <button class="text-sm block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 bold">{{ucwords(auth()->user()->username)}}</button>
                               
                                <a href="/logout" class="text-sm sm:text-base">{{__('messages.logout')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="px-5 sm:px-0">
        <h1>{{$infoType}}</h1>
    </div>
    <div class="flex gap-10 border-b border-light-gray px-5 sm:px-0">
        <a href="/landing-worldwide" class="{{ request()->route()->uri === 'landing-worldwide' ? 'border-b-2' : ''}} text-sm sm:text-base">{{__('messages.Worldwide')}}</a>
        <a href="/landing-bycountry" class="{{ request()->route()->uri === 'landing-bycountry' ? 'border-b-2' : ''}} text-sm sm:text-base">{{__('messages.by_country')}}</a>
    </div>
    <div>
        {{$slot}}
    </div>
</div>