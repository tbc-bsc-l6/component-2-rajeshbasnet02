<x-guest-layout>



    <section class="individual___product__section w-[60%] mx-auto mt-24">

        <div class="flex justify-center mb-8">
            <nav class="rounded-md w-full">
                <ol class="list-reset flex">
                    <li><a href="/" class="text-blue-600 hover:text-blue-700">Home</a></li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li><a href="/products/{{$category}}" class="text-blue-600 hover:text-blue-700">{{ucfirst($category)}}</a></li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li class="text-gray-500">Product</li>
                </ol>
            </nav>
        </div>

        <div class="individual__product__section__container">
            <div class="product__image__container w-full">
                <img src="/images/download.png" class="object-cover w-full" alt="">
            </div>

            <div class="product__information__container w-full text-gray-700">
                <p class="font-extrabold text-2xl">{{$product->product_title}}</p>

                <p class="font-bold leading-10">Author / Artist : {{$product->product_author}}</p>

                <p class="text-yellow-400 w-32 flex mt-2 mb-6">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                         class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 576 512">
                        <path fill="currentColor"
                              d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/>
                    </svg>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                         class="ml-1 svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 576 512">
                        <path fill="currentColor"
                              d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/>
                    </svg>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                         class="ml-1 svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 576 512">
                        <path fill="currentColor"
                              d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/>
                    </svg>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                         class="ml-1 svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 576 512">
                        <path fill="currentColor"
                              d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/>
                    </svg>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                         class="ml-1 svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 576 512">
                        <path fill="currentColor"
                              d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/>
                    </svg>
                </p>

                <p>{{$product->product__description}}</p>
                <p class="font-bold text-2xl mt-4 mb-2">Price : ${{$product->price}}</p>

                <div class="end__product__desc flex items-center justify-between">
                    @if($category == "games")
                        <p class="leading-6">Pegi : {{$product->product_feature}}</p>
                    @elseif($category == "cds")
                        <p class="leading-6">Duration : {{$product->product_feature}}</p>
                    @elseif($category == "books")
                        <p class="leading-10">Pages : {{$product->product_feature}}</p>
                    @endif

                    <p class="leading-10">Last updated at {{$product->updated_at}}</p>
                </div>
            </div>
        </div>

    </section>
</x-guest-layout>
