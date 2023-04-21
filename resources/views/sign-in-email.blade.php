<x-layout>
    <div class="flex gap-5 justify-center min-h-screen">
        <div class="min-vh-100 w-35 max-w-30 flex flex-col">
            <div class="mt-10 flex justify-center mb-28">
                <img src="{{asset("images/Group 1@2x.png")}}" class="w-2/4"/>
            </div>
            <div class="flex justify-center">
                <img src="{{asset(asset('images/icons8-checked 1.png'))}}" class="w-14"/>
            </div>
            <p>Your password has been updeted successfully</p>
            <a href="/" class="mt-10 text-white bg-green hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">Sign in</a>
        </div>
    </div>
</x-layout>

