<x-layout>
    <div class="flex gap-5 justify-center min-h-screen">
        <div class="min-vh-100 w-35 max-w-30 flex flex-col">
            <div class="mt-10 flex justify-center mb-28">
                <img src="{{asset("images/Group 1@2x.png")}}" class="w-2/4"/>
            </div>
            <div class="mb-10">
                @include('components.lang-dropdown')
            </div>
            <form class="flex flex-col gap-10" method="POST" action="/reset-password">
                @csrf
                <h1 class='font-bold text-xl text-center text-dark bold tracking-2'>{{__('messages.reset_password')}}</h1>
                <div class="mb-2 relative">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('messages.email')}}</label>
                    <input type="email" id="email" name="email" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{__('messages.enter_your_email')}}">
                    @if(session('success'))
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{!! session('success') !!}</span>
                    @endif
                </div>
                <button type="submit" class="text-white bg-green hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">{{__('messages.reset_password')}}</button>
            </form>
        </div>
    </div>
</x-layout>