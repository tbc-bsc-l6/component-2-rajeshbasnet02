<x-guest-layout>

    @if(session('subscribed'))
        <x-alert class="bg-indigo-800 text-white rounded-full fixed top-[90%] right-[1%] py-2 px-2">
            {{__('Thank you for subscribing our newletter!')}}
        </x-alert>
    @elseif(session('logout'))
        <x-alert class="bg-indigo-800 text-white rounded-full fixed top-[90%] right-[1%] py-2 px-2">
            {{__('Logout successfull !')}}
        </x-alert>
    @endif

    <section class="homepage__banner h-[90vh] bg-cover w-full">
    </section>


</x-guest-layout>

