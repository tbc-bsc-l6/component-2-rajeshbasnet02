<x-guest-layout>

    <x-banner :category="__('cd')" :description="__('Just a better place for watching cds. Explore our store with great gift hampers.')" :event="__('We have what you need !')"/>

    <x-search :category="__('cd')"/>

    <section class="w-[80%] products__section mx-auto mt-14">

        <x-breadcrumb :first="__('Home')" :second="__('cds')" :third="__('Products')" />

        <br>

        <div class="products__section__container grid gap-x-8 gap-y-12">

                @foreach($cds as $cd)
                    <x-individual :category="__('cds')">

                        <x-slot name="title">
                            {{$cd->product_title}}
                        </x-slot>

                        <x-slot name="price">
                            {{$cd->price}}
                        </x-slot>

                        <x-slot name="image">
                            {{$cd->image}}
                        </x-slot>

                        <x-slot name="product_id">
                            {{$cd->id}}
                        </x-slot>

                    </x-individual>
                @endforeach

        </div>

        <br/>
        <br/>

        {{$cds->links()}}

    </section>

    <div class="my-12"></div>


</x-guest-layout>
