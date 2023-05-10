<x-layout>
    <div class="flex gap-5 justify-center min-h-screen">
        <div class="min-vh-100 w-35 max-w-30 flex flex-col">
            <div class="mt-10 flex justify-center mb-28">
                <img src="{{asset("images/Group 1@2x.png")}}" class="w-2/4"/>
            </div>
            <div class="flex justify-center">
                <img src="{{asset(asset('images/icons8-checkmark.gif'))}}" class="w-14"/>
            </div>
            <p class="mt-5">{{__('messages.email_confirmation')}}</p>
        </div>
    </div>
</x-layout>