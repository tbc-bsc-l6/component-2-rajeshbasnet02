<x-guest-layout>

    <x-product>

        <x-slot name="action">
            {{__("/products/update/{$product[0]->id}")}}
        </x-slot>

        <div class="mt-4">
            <x-label for="author" :value="__('Author / Artist')"/>

            <x-input id="author" class="block mt-1 w-full" type="text" name="product__author"
                     value="{{$product[0]->product_author}}" required/>
        </div>

        <!-- Product Title -->
        <div class="mt-4">
            <x-label for="title" :value="__('Title')"/>

            <x-input id="title" class="block mt-1 w-full" type="text" name="product__title"
                     value="{{$product[0]->product_title}}" required/>
        </div>

        <!-- Product Feature -->
        <div class="mt-4">
            <x-label for="feature" :value="__('Pages / Duration / Pegi')"/>

            <x-input id="feature" class="block mt-1 w-full" type="text" name="product__feature"
                     value="{{$product[0]->product_feature}}" required/>
        </div>

        <!-- Product Price -->
        <div class="mt-4">
            <x-label for="price" :value="__('Price ($)')"/>

            <x-input id="price" class="block mt-1 w-full" type="text" name="product__price"
                     value="{{$product[0]->price}}" required/>
        </div>

        <!-- Product Price -->
        <div class="mt-4">
            <x-label for="product__price" :value="__('Product Description')"/>

            <textarea name="product__desc" id="product__desc"
                      class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                {{$product[0]->product__description}}
            </textarea>
        </div>

        <x-slot name="btn__name">
            {{ __("Update Produuct") }}
        </x-slot>

        {{$errors}}


    </x-product>
</x-guest-layout>
