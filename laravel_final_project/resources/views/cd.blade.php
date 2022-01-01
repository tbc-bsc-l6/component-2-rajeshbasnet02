<x-guest-layout>
    <section class="cds__section">
        <div class="cds__section__container">
            <div class="cds__banner__image bg-cover bg-center flex items-center h-[75vh]"  style="background-image: url('/images/slider-cd.jpg');">
                <div class="ml-36">
                    <h2 class="text-5xl font-extrabold leading-loose">Explore latest videos and movies.</h2>
                    <p class="text-xl">Stream latest movies, show, series from our store.</p>
                    <br>
                    <x-button class="py-3 px-8">
                        {{ __('Visit Store') }}
                    </x-button>
                </div>
            </div>
        </div>
    </section>


    <section style="width: 60%;" class="search__section mx-auto mt-28">
        <div class="search__section__container">

            <form action="" class="flex items-center justify-around">

                <div class="search__input basis-1/2">
                    <input type="text" name="" id="" class="form-input w-full rounded-md">
                </div>

                <div class="search__categories basis-1/4">
                    <select name="category" id="category" class="w-full rounded-md">
                        <option value="asc" disabled selected>Select</option>
                        <option value="asc">From A-Z</option>
                        <option value="desc">From Z-A</option>
                        <option value="price__high">Higher price</option>
                        <option value="price__low">Lower price</option>
                    </select>
                </div>

                <div>
                    <x-button type="submit" class="py-3 px-14 bg-black-800 font-extrabold">
                        {{ __('Search') }}
                    </x-button>
                </div>

            </form>

        </div>
    </section>




    <section style="width: 80%" class="products__section mx-auto mt-32">
        <div class="products__section__container grid gap-x-8 gap-y-12">

            @foreach($cds[0]->product as $game__product)
                <div class="individual__product border-2 border-solid border-gray-200 w-full">

                    <img src="/images/download.png" height="300px" class="object-cover w-full" alt="">

                    <br>

                    <div class="flex items-baseline justify-between mx-4 ">
                        <p class="text-md font-bold text-gray-700">{{$game__product->product_author}}</p>
                        <p class="text-md font-bold text-gray-700">${{$game__product->price}}</p>
                    </div>

                    <br>

                    <div class="flex items-baseline justify-end mx-4 mb-6">
                        <a href="/products/cds/{{$game__product->id}}" class="text-gray-500 font-bold flex items-center">
                            Explore
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                                 class="svg-inline--fa fa-chevron-right fa-w-0 w-2 ml-1" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path fill="currentColor"
                                      d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/>
                            </svg>
                        </a>
                    </div>
                </div>
        @endforeach

    </section>

    <section class="h-[10vh]"></section>

</x-guest-layout>
