<x-guest-layout>

    <x-banner :category="__('game')" :description="__('Take advantage of these gifts during Holiday Sale and look the par this season')" :event="__('Holiday Sale !')"/>


    <x-search :category="__('game')"/>

    <section class="products__section mx-auto mt-14 w-[80%]">

        <x-breadcrumb :first="__('Home')" :second="__('games')" :third="__('Products')" />

        <br/>

        <div class="products__section__container grid gap-x-8 gap-y-12">
            @foreach($games as $game)
                <x-individual :category="__('games')">
                    <x-slot name="title">
                        {{$game->product_title}}
                    </x-slot>

                    <x-slot name="price">
                        {{$game->price}}
                    </x-slot>

                    <x-slot name="image">
                        {{$game->image}}
                    </x-slot>

                    <x-slot name="product_id">
                        {{$game->id}}
                    </x-slot>
                </x-individual>
            @endforeach
        </div>

        @if(count($games) <= 0)
            <div class="w-full my-8">
                <div style="width: fit-content" class="bg-indigo-600 py-6 mx-auto px-8 rounded-lg shadow-md">
                    <p class="text-center text-xl font-bold leading-loose text-gray-100">Oops :(</p>
                    <p class="text-center text-lg font-bold leading-loose text-gray-100">We cannot find product you are searching for.</p>
                </div>
            </div>
        @endif

        <br/>
        <br/>

        {{$games->links()}}

    </section>

    <div class="my-12"></div>


</x-guest-layout>
