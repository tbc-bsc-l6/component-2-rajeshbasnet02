<x-guest-layout>
    <x-product>

        <x-slot name="action">
            {{__('/products')}}
        </x-slot>

        <div class="mt-4">
            <x-label for="author" :value="__('Author / Artist')"/>

            <x-input id="author" class="block mt-1 w-full" type="text" name="product__author"
                     :value="old('product__author')" required/>
        </div>

        <!-- Product Title -->
        <div class="mt-4">
            <x-label for="title" :value="__('Title')"/>

            <x-input id="title" class="block mt-1 w-full" type="text" name="product__title"
                     :value="old('product__title')" required/>
        </div>

        <!-- Product Feature -->
        <div class="mt-4">
            <x-label for="feature" :value="__('Pages / Duration / Pegi')"/>

            <x-input id="feature" class="block mt-1 w-full" type="text" name="product__feature"
                     :value="old('product__feature')" required/>
        </div>

        <!-- Product Price -->
        <div class="mt-4">
            <x-label for="price" :value="__('Price')"/>

            <x-input id="price" class="block mt-1 w-full" type="text" name="product__price"
                     :value="old('product__price')" required/>
        </div>

        <!-- Product Description -->
        <div class="mt-4">
            <x-label for="product__price" :value="__('Product Description')"/>

            <textarea name="product__desc" id="product__desc" value="old('product__desc')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </textarea>
        </div>

        <!-- Product Category -->
        <div class="mt-4">
            <x-label for="product__price" :value="__('Product Category')"/>

            <select name="product__category" id="product__category" class="mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                <option value="book">Book</option>
                <option value="cd">Cd</option>
                <option value="game">Game</option>
            </select>
        </div>

        <x-slot name="btn__name">
            {{ __("Add Product") }}
        </x-slot>
    </x-product>

    {{$errors}}
</x-guest-layout>
