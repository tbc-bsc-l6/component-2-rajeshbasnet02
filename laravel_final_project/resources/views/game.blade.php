<x-guest-layout>

    <x-banner>
        <x-slot name="product_category">
            {{__("game")}}
        </x-slot>
    </x-banner>


    <x-search>
        <x-slot name="category">
            {{__("game")}}
        </x-slot>
    </x-search>

    <section style="width: 80%" class="products__section mx-auto mt-32">
        <div class="products__section__container grid gap-x-8 gap-y-12">

            @if($products ?? "")

                @foreach($products as $game__product)
                    <x-individual>
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


            @elseif($games)

                @foreach($games[0]->product as $game__product)
                    <x-individual>
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

        @endif

    </section>


</x-guest-layout>
