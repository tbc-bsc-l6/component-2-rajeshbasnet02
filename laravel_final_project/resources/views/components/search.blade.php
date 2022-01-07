@props(['category'])

<section class="search__section mx-auto mt-28 w-[60%]">
    <div class="search__section__container">

        <form action="/products/{{$category ?? ""}}/search" class="flex items-center justify-around">

            <div class="search__input basis-1/2">
                <input type="text" name="product" id="search__product" class="form-input w-full rounded-md border-2 border-gray-300 focus:bg-blue-50 focus:border-50 focus:border" :value="old('product')">
            </div>

            <div class="search__categories basis-1/4">
                <select name="category" id="category" class="w-full rounded-md border-2 border-gray-300 focus:border-50 focus:border focus:bg-blue-50">
                    <option value="asc" disabled selected>Select</option>
                    <option value="asc">From A-Z</option>
                    <option value="desc">From Z-A</option>
                    <option value="price__high">Higher price</option>
                    <option value="price__low">Lower price</option>
                </select>
            </div>

            <div>
                <x-button type="submit" class="py-3 px-14 font-extrabold">
                    {{ __('Search') }}
                </x-button>
            </div>

        </form>

    </div>
</section>
