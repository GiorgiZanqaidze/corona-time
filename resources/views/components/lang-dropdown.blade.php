<div>
    <div x-data="{ open: false }" @click.away="open = false" class="relative">
        <button @click="open = !open">{{App::getLocale() === "ka" ? "ქართული" : "English"}} <img src="{{asset('images/arrow.png')}}" alt="arrow" class="inline"></button>
        <div x-show="open" class="absolute flex flex-col gap-2 mt-2">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    @if (App::getLocale() === 'en')
                        <a href="{{ route('lang.switch', $lang) }}" class="pr-2">Georgian</a>
                        @else
                        <a href="{{ route('lang.switch', $lang) }}" class="pr-2">ინგლისური</a>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</div>