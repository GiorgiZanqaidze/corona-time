<x-layout>
    <div class="flex gap-5 justify-center min-h-screen">
        <div class="min-vh-100 w-35 max-w-30 flex flex-col">
            <div class="mt-10 flex justify-center mb-28">
                <img src="{{asset("images/Group 1@2x.png")}}" class="w-2/4"/>
            </div>
            <form class="flex flex-col gap-10">
                <h1 class='font-bold text-xl text-center text-dark bold tracking-2'>Reset Password</h1>
                <div class="mb-2">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter new password">
                </div>
                <div class="mb-2">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat Password</label>
                    <input type="password_confirmation" id="password_confirmation" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Repeat password">
                </div>
                <button type="submit" class="text-white bg-green hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold">SAVE CHANGES</button>
            </form>
        </div>
    </div>
</x-layout>