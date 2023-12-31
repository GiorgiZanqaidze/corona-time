<x-layout>
    <div class="flex gap-5 justify-center lg:justify-between min-h-screen">
        <div class="lg:ml-40 mt-20 min-vh-100 w-35 lg:w-30 max-w-30 mb-6">
            <div class="mb-10">
                @include('components.lang-dropdown')
            </div>
            <form class="flex flex-col gap-3 max-w-xs" method="POST" action="/post-login">
            @csrf
                <div>
                    <img src="{{asset("images/Group 1@2x.png")}}" class="w-2/4"/>
                </div>
                <h1 class='font-bold'>{{__('messages.welcome_back')}}</h1>
                <p class="font-light text-xs text-gray text-xl">{{__('messages.enter_details')}}</p>
                <div class="mb-6 relative">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('messages.username_or_email')}}</label>
                    <input id="username" type="text" class="border {{$errors->has('username') || session('message') ? 'border-error-red' : 'border-borderCl'}} {{!$errors->has('username') && $errors->any() ? 'border-green' : 'border-borderCl'}} p-3 shadow-sm bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:shadow-sm-light" name="username" value="{{ old('username') }}" placeholder="{{__('messages.enter_unique')}}">
                    @error('username')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                    @if (session('message'))
                        <span class="text-xs text-error-red text-wrap"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{session('message')}}</span>
                        @endif
                    @if (!$errors->has('username') && $errors->any())
                    <img src="{{asset('images/green-icon.png')}}" class="absolute right-2 bottom-[30%] translate-y-[50%]"/>
                    @endif
                </div>
                <div class="mb-6 relative">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('messages.password')}}</label>
                    <input type="password" name="password" id="password" class="{{$errors->has('password') || session('message') ? 'border-error-red' : 'border-borderCl'}} {{!$errors->has('password') && $errors->any() ? 'border-green' : 'border-borderCl'}} p-3 shadow-sm bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:shadow-sm-light" placeholder="{{__('messages.fill_in_password')}}">
                    @error('password')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                    @if (!$errors->has('password') && $errors->any())
                    <img src="{{asset('images/green-icon.png')}}" class="absolute right-2 bottom-[30%] translate-y-[50%]"/>
                    @endif
                </div>
                <div class="flex items-start mb-6 relative">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" name="remember" value="1" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                    </div>
                    <label for="terms" class="ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">{{__('messages.remember_device')}}<a href="/reset-password" class="text-blue-600 hover:underline dark:text-blue-500 text-right absolute right-4 text-blue text-xs">{{__('messages.forget_password')}}?</a></label>
                </div>
                <button type="submit" class="text-white bg-green hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">{{__('messages.login')}}</button>
                <span class="text-xs text-center text-gray">{{__('messages.dont_have_acount')}}? <strong><a href="/register" class="hover:underline text-dark">{{__('messages.sign_up_for_free')}}</a></strong></p>
            </form>
        </div>
        <div class="hidden lg:block min-height-screen">
            <img src="{{asset('images/Rectangle 1.png')}}" style="height: 100%;"/>
        </div>
    </div>
</x-layout>