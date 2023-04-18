<x-layout>
    <div class="flex gap-5 justify-center lg:justify-between min-h-screen">
        <div class="lg:ml-40 mt-20 min-vh-100 w-35 lg:w-30 max-w-30">
            <form class="flex flex-col gap-3 mb-10" method="POST" action="/register">
            @csrf
                <div>
                    <img src="{{asset("images/Group 1@2x.png")}}" class="w-2/4"/>
                </div>
                <h1 class='font-bold'>Welcome To Coronatime</h1>
                <p class="font-light text-xs text-gray text-xl">Please enter required info to sign up</p>
                <div class="mb-6">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    
                    <input type="username" id="username" name="username" value="{{old('username')}}" class="border-2 {{$errors->has('username') ? 'border-error-red' : 'border-blue'}} p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter unique username">
                    @error('username')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="email" name="email" value="{{old('email')}}" class="border-2 {{$errors->has('email') ? 'border-error-red' : 'border-blue'}} p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your email">
                    @error('email')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}" class="border-2 {{$errors->has('password') ? 'border-error-red' : 'border-blue'}} p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Fill in password">
                    @error('password')
                        <span class="text-xs text-error-red"><img src="{{asset('images/remix-icons-fill-system-error-warning-fill.png')}}" class="inline mr-2"/>{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="border-2 {{$errors->has('password_confirmation') ? 'border-error-red' : 'border-blue'}} p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Repeat password">
                    @error('password_confirmation')
                        <span class="text-xs text-error-red">{{$message}}</span>
                    @enderror
                </div>
                {{-- <div class="flex items-start mb-6 relative">
                    <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                    </div>
                    <label for="terms" class="ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">Remember this device</label>
                </div> --}}
                <button type="submit" class="text-white bg-green hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">Sign Up</button>
                <span class="text-xs text-center text-gray">Already have an account? <strong><a href="/" class="hover:underline text-dark">Log In</a></strong></p>
            </form>
        </div>
        <div class="hidden lg:block min-h-screen">
            <img src="{{asset('images/Rectangle 1.png')}}" class="h-full"/>
        </div>
    </div>
</x-layout>