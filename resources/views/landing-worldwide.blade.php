<x-layout>
    <x-header infoType="{{__('messages.worldwide_statistics')}}">
        <div class="sm:flex grid grid-cols-2 justify-between mt-10 gap-5">
            <div class="sm:w-1/4 col-span-2 h-60 relative flex justify-center rounded-2xl truncate">
                <div class="w-full h-full bg-blue opacity-08"></div>
                <img src="{{asset('images/Group 1797.png')}}" class="sm:w-1/4 w-1/2 h-20 aspect-square opacity-100 absolute top-[30%] left-[50%] translate-x-[-50%]"/>
                <h2 class="absolute bottom-[30%] left-[50%] text-red-500 translate-x-[-50%] opacity-100">{{__('messages.new_cases')}}</h2>
                {{-- <h1 class="absolute bottom-[10%] left-[50%] text-red-500 translate-x-[-50%] opacity-100 text-3xl text-blue font-bold">{{$confirmed}}<h1> --}}
            </div>
            <div class="sm:w-1/4 h-60 relative grid-cols-1 flex justify-center rounded-2xl truncate">
                <div class="w-full h-full bg-green opacity-08"></div>
                <img src="{{asset('images/green-stats.svg')}}" class="sm:w-1/4 w-1/2 h-20 aspect-square opacity-100 absolute top-[30%] left-[50%] translate-x-[-50%]"/>
                <h2 class="absolute bottom-[30%] left-[50%] text-red-500 translate-x-[-50%] opacity-100">{{__('messages.recovered')}}</h2>
                {{-- <h1 class="absolute bottom-[10%] left-[50%] text-red-500 translate-x-[-50%] opacity-100 text-3xl text-blue font-bold">{{$recovered}}<h1> --}}
            </div>
            <div class="sm:w-1/4 h-60 relative grid-cols-1 flex justify-center rounded-2xl truncate">
                <div class="w-full h-full bg-yellow opacity-08"></div>
                <img src="{{asset('images/yellow-stats.svg')}}" class="sm:w-1/4 w-1/2 h-20 aspect-square opacity-100 absolute top-[30%] left-[50%] translate-x-[-50%]"/>
                <h2 class="absolute bottom-[30%] left-[50%] text-red-500 translate-x-[-50%] opacity-100">{{__('messages.death')}}</h2>
                {{-- <h1 class="absolute bottom-[10%] left-[50%] text-red-500 translate-x-[-50%] opacity-100 text-3xl text-blue font-bold">{{$deaths}}<h1> --}}
            </div>
        </div>
    </x-header>
</x-layout>