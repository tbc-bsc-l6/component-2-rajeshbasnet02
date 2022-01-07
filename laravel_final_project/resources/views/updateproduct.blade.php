<x-guest-layout>

    <x-slot name="footer"></x-slot>

    <x-product :desc="__('Update your products here')" :button="__('Update Product')" :method="__('put')">

        <x-slot name="action">
            {{__("/products/{$product->id}/update")}}
        </x-slot>


        <div class="mt-12">
            <x-label for="author" :value="__('Author / Artist')"/>

            <x-input id="author" class="block mt-1 w-full" type="text" name="product__author"
                     value="{{$product->product_author}}" required/>
            @error("product__author")
            <p class="text-sm pt-1 text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Product Title -->
        <div class="mt-4">
            <x-label for="title" :value="__('Title')"/>

            <x-input id="title" class="block mt-1 w-full" type="text" name="product__title"
                     value="{{$product->product_title}}" required/>
            @error("product__title")
            <p class="text-sm pt-1 text-red-500">{{$message}}</p>
            @enderror

        </div>

        <!-- Product Feature -->
        <div class="mt-4">
            <x-label for="feature" :value="__('Pages / Duration / Pegi')"/>

            <x-input id="feature" class="block mt-1 w-full" type="text" name="product__feature"
                     value="{{$product->product_feature}}" required/>
            @error("product__feature")
            <p class="text-sm pt-1 text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mt-4">
            <x-label for="price" :value="__('Price ($)')"/>

            <x-input id="price" class="block mt-1 w-full" type="number" name="product__price"
                     value="{{$product->price}}" required/>
            @error("product__price")
            <p class="text-sm pt-1 text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mt-4">
            <x-label for="product__price" :value="__('Product Description')"/>

            <textarea name="product__desc" id="product__desc"
                      class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{$product->product__description}}
            </textarea>
            @error("product__desc")
            <p class="text-sm pt-1 text-red-500">{{$message}}</p>
            @enderror
        </div>

    </x-product>


</x-guest-layout>
