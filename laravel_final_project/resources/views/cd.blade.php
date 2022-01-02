<x-guest-layout>

    <x-banner :category="__('cd')"/>


    <x-search :category="__('cd')"/>

    <section class="w-[80%] products__section mx-auto mt-14">

        <x-breadcrumb :first="__('Home')" :second="__('Cds')" :third="__('Products')" />

        <br>

        <div class="products__section__container grid gap-x-8 gap-y-12">

                @foreach($cds as $game__product)
                    <x-individual :category="__('cds')">

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

        {{$cds->links()}}

    </section>

</x-guest-layout>
