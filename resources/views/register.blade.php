<x-layout>
    <div class="flex gap-5 justify-center lg:justify-between min-h-screen">
        <div class="lg:ml-40 mt-20 min-vh-100 w-35 lg:w-30 max-w-30 mx-6">
            <div class="mb-10">
                @include('components.lang-dropdown')
            </div>
            <form class="flex flex-col gap-3 mb-10" method="POST" action="/register">
            @csrf
                <div>
                    <img src="{{asset("images/Group 1@2x.png")}}" class="w-2/4"/>
                </div>
                <h1 class='font-bold'>{{__('messages.welcome_to_coronatime')}}</h1>
                <p class="font-light text-xs text-gray text-xl">{{__('messages.required_info_to_sign_up')}}</p>
                <div class="mb-6 relative">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('messages.username')}}</label>
                    <input type="username" id="username" name="username" value="{{old('username')}}" class="border {{$errors->has('username') ? 'border-error-red' : 'border-borderCl'}} {{!$errors->has('username') && $errors->any() ? 'border-green' : 'border-borderCl'}} p-3 shadow-sm bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:shadow-sm-light" placeholder="{{__('messages.unique_username')}}">
                    @error('username')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                    @if (!$errors->has('username') && $errors->any())
                    <img src="{{asset('images/green-icon.png')}}" class="absolute right-2 bottom-[30%] translate-y-[50%]"/>
                    @endif
                </div>
                <div class="mb-6 relative">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('messages.email')}}</label>
                    <input type="email" id="email" name="email" value="{{old('email')}}" class="{{$errors->has('email') ? 'border-error-red' : 'border-borderCl'}} {{!$errors->has('email') && $errors->any() ? 'border-green' : 'border-borderCl'}} p-3 shadow-sm bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:shadow-sm-light" placeholder="{{__('messages.enter_your_email')}}">
                    @error('email')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                    @if (!$errors->has('email') && $errors->any())
                    <img src="{{asset('images/green-icon.png')}}" class="absolute right-2 bottom-[30%] translate-y-[50%]"/>
                    @endif
                </div>
                <div class="mb-6 relative">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('messages.password')}}</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}" class="{{$errors->has('password') ? 'border-error-red' : 'border-borderCl'}} {{!$errors->has('password') && $errors->any() ? 'border-green' : 'border-borderCl'}} p-3 shadow-sm bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:shadow-sm-light" placeholder="{{__('messages.password')}}">
                    @error('password')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                    @if (!$errors->has('password') && $errors->any())
                    <img src="{{asset('images/green-icon.png')}}" class="absolute right-2 bottom-[30%] translate-y-[50%]"/>
                    @endif
                </div>
                <div class="mb-6 relative">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('messages.repeat_password')}}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="{{$errors->has('password') ? 'border-error-red' : 'border-borderCl'}} {{!$errors->has('password') && $errors->any() ? 'border-green' : 'border-borderCl'}} p-3 shadow-sm bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:shadow-sm-light" placeholder="{{__('messages.repeat_password')}}">
                    @error('password')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                    @if (!$errors->has('password') && $errors->any())
                    <img src="{{asset('images/green-icon.png')}}" class="absolute right-2 bottom-[30%] translate-y-[50%]"/>
                    @endif
                </div>
                <button type="submit" class="text-white bg-green hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">{{__('messages.sign_up')}}</button>
                <span class="text-xs text-center text-gray">{{__('messages.already_have_an_account')}}? <strong><a href="/" class="hover:underline text-dark">{{__('messages.login')}}</a></strong></p>
            </form>
        </div>
        <div class="hidden lg:block min-h-screen">
            <img src="{{asset('images/Rectangle 1.png')}}" class="h-full"/>
        </div>
    </div>
</x-layout>