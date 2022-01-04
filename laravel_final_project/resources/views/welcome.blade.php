<x-guest-layout>

    @if(session('subscribed'))
        <x-alert class="bg-indigo-800 text-white rounded-[0px] fixed top-[90%] right-[2%]">
            {{__('Thank you for subscribing our newletter!')}}
        </x-alert>
    @endif

    <section class="homepage__banner h-[90vh] bg-cover w-full">
    </section>


</x-guest-layout>

