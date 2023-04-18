@props(['infoType'])

<div class="mx-10 my-5 flex flex-col gap-5">
    <header>
        <nav class="bg-white border-gray-200 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <img src="{{asset('images/Group 1@2x.png')}}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                                <button @click="open = !open">{{App::getLocale() === "ka" ? "Georgian" : "English"}} <img src="{{asset('images/arrow.png')}}" alt="arrow" class="inline"></button>
                                <ul x-show="open" class="absolute flex flex-col gap-2 mt-2">
                                    @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <a href="{{ route('lang.switch', $lang) }}" class="pr-2">{{$language}}</a>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <p href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 bold">{{ucwords(auth()->user()->username)}}</p>
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                            @csrf
                            <button class="hover:underline underline-offset-1 text-center text-center">{{__('messages.logout')}}<button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div>
        <h1>{{$infoType}}</h1>
    </div>
    <div class="flex gap-10 border-b border-red-500">
        <a href="/landing-worldwide" class="{{ request()->route()->uri === 'landing-worldwide' ? 'border-b-2' : ''}} ">Worldwide</a>
        <a href="/landing-bycountry" class="{{ request()->route()->uri === 'landing-bycountry' ? 'border-b-2' : ''}} ">By Country</a>
    </div>
    <div>
        {{$slot}}
    </div>
</div>