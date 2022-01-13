<x-guest-layout>

    <x-banner :category="__('book')"
              :description="__('Take a good book to bed with you—books do not snore. Here are some deals !')"
              :event="__('New Year Deals !')"/>

    <x-search :category="__('book')"/>

    <section class="w-[80%] products__section mx-auto mt-14">

        <x-breadcrumb :first="__('Home')" :second="__('books')" :third="__('Products')"/>

        <br/>

        <div class="products__section__container grid gap-x-8 gap-y-12">

            @foreach($books as $book)
                <x-individual :category="__('books')">

                    <x-slot name="title">
                        {{$book->product_title}}
                    </x-slot>

                    <x-slot name="price">
                        {{$book->price}}
                    </x-slot>

                    <x-slot name="image">
                        {{$book->image}}
                    </x-slot>

                    <x-slot name="product_id">
                        {{$book->id}}
                    </x-slot>

                </x-individual>
            @endforeach
        </div>

        @if(count($books) <= 0)
            <div class="w-full my-8">
                <div style="width: fit-content" class="bg-indigo-400 py-6 mx-auto px-8 rounded-lg">
                    <p class="text-center text-xl font-bold leading-loose text-gray-100">Oops :(</p>
                    <p class="text-center text-lg font-bold leading-loose text-gray-100">We cannot find product you are searching for.</p>
                </div>
            </div>
        @endif

        <br/>
        <br/>

        {{$books->links() }}

    </section>

    <div class="my-12"></div>


</x-guest-layout>
