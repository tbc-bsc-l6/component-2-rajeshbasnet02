<x-guest-layout>

    <x-banner :category="__('game')"/>


    <x-search :category="__('game')"/>

    <section class="products__section mx-auto mt-14 w-[80%]">

        <x-breadcrumb :first="__('Home')" :second="__('games')" :third="__('Products')" />

        <br/>

        <div class="products__section__container grid gap-x-8 gap-y-12">
            @foreach($games as $game__product)
                <x-individual :category="__('games')">
                    <x-slot name="title">
                        {{$game__product->product_title}}
                    </x-slot>

                    <x-slot name="price">
                        {{$game__product->price}}
                    </x-slot>

                    <x-slot name="product_id">
                        {{$game__product->id}}
                    </x-slot>
                </x-individual>
            @endforeach
        </div>

        <br/>
        <br/>

        {{$games->links()}}

    </section>

    <div class="my-12"></div>


</x-guest-layout>
