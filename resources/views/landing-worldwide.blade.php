<x-layout>
    <x-header infoType="{{__('messages.worldwide_statistics')}}">
        <div class="sm:flex grid grid-cols-2 justify-between sm:mt-10 sm:mx-10 sm:gap-9 m-4 gap-4">
            <div class="sm:w-2/6 col-span-2 relative flex justify-center rounded-2xl truncate h-52 sm:h-64">
                <div class="w-full h-full bg-blue opacity-08"></div>
                <img src="{{asset('images/Group 1797.png')}}" class="sm:w-1/4 w-1/2 h-20 aspect-square opacity-100 absolute top-[30%] left-[50%] translate-x-[-50%]"/>
                <h2 class="absolute bottom-[30%] left-[50%] translate-x-[-50%] opacity-100 text-[16px] sm:text-sm md:text-xl">{{__('messages.new_cases')}}</h2>
                <h1 class="absolute bottom-[10%] left-[50%] translate-x-[-50%] opacity-100 text-base sm:text-xl md:text-3xl text-blue font-bold">{{$confirmed}}<h1>
            </div>
            <div class="sm:w-2/6 relative grid-cols-1 flex justify-center rounded-2xl truncate h-52 sm:h-64">
                <div class="w-full h-full bg-green opacity-08"></div>
                <img src="{{asset('images/green-stats.svg')}}" class="sm:w-1/4 w-1/2 h-20 aspect-square opacity-100 absolute top-[30%] left-[50%] translate-x-[-50%]"/>
                <h2 class="absolute bottom-[30%] left-[50%] translate-x-[-50%] opacity-100 text-[16px] sm:text-sm md:text-xl">{{__('messages.recovered')}}</h2>
                <h1 class="absolute bottom-[10%] left-[50%] translate-x-[-50%] opacity-100 text-base sm:text-xl md:text-3xl text-blue font-bold">{{$recovered}}<h1>
            </div>
            <div class="sm:w-2/6 relative grid-cols-1 flex justify-center rounded-2xl truncate h-52 sm:h-64">
                <div class="w-full h-full bg-yellow opacity-08"></div>
                <img src="{{asset('images/yellow-stats.svg')}}" class="sm:w-1/4 w-1/2 h-20 aspect-square opacity-100 absolute top-[30%] left-[50%] translate-x-[-50%]"/>
                <h2 class="absolute bottom-[30%] left-[50%] translate-x-[-50%] opacity-100 text-[16px] sm:text-sm md:text-xl">{{__('messages.death')}}</h2>
                <h1 class="absolute bottom-[10%] left-[50%] translate-x-[-50%] opacity-100 text-base sm:text-xl md:text-3xl text-blue font-bold">{{$deaths}}<h1>
            </div>
        </div>
    </x-header>
</x-layout>