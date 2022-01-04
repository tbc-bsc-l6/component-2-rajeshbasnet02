<x-guest-layout>

    @foreach($products as $product)

        <section class="individual___product__section w-[60%] mx-auto mt-24">
            <div class="flex justify-center mb-8">
                <nav class="rounded-md w-full">
                    <ol class="list-reset flex font-bold">
                        <li><a href="/" class="text-blue-600 hover:text-blue-700">Home</a></li>
                        <li><span class="text-gray-500 mx-2">/</span></li>
                        <li><a href="/products/{{$category}}"
                               class="text-blue-600 hover:text-blue-700">{{ucfirst($category)}}</a></li>
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
                    <p class="font-extrabold text-2xl">{{ucwords($product->product_title)}}</p>

                    <p class="font-bold leading-10">Author / Artist : {{$product->product_author}}</p>


                    <p class="text-yellow-400 w-28 flex mt-2 mb-4">
                        <span class="fa fa-star mr[.1rem]"></span>
                        <span class="fa fa-star mr-[.1rem]"></span>
                        <span class="fa fa-star mr-[.1rem]"></span>
                        <span class="fa fa-star mr-[.1rem]"></span>
                        <span class="fa fa-star"></span>
                    </p>

                    <p>{{$product->product__description}}</p>

                    <p class="font-bold text-xl mt-2 mb-2">Price : ${{$product->price}}</p>

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

        </section>

        <div class="comments__container ">

            @if(!auth()->user())
                <p class="login__action__para mb-3">
                    <a href="/login" class="text-indigo-600">Sign in</a> or <a href="/register"
                                                                               class="text-indigo-600">Sign
                        up</a> to add comments on
                    this product.
                </p>
            @endif


            @if( $product->comment->count() > 0)
                @auth
                    <p class="login__action__para font-bold text-lg mb-3">
                        Comments of above product
                    </p>
                @endauth
            @endif

            @foreach($product->comment as $product__comment)

                <div class="comment__info">
                    <p class="comment__header">{{$product__comment->comments}}</p>
                    <div>
                        <img src="/images/avatar.png" alt=""/>
                        <p>{{$product__comment->user->firstname}}</p>
                        <p>{{$product__comment->created_at}}</p>

                        @for($i = 0; $i < $product__comment->ratings; $i++)
                            <span class="text-yellow-400 fa fa-star mr-[.1rem] mb-1"></span>
                        @endfor

                        @for($i = 0; $i < (5-$product__comment->ratings); $i++)
                            <spn class="text-yellow-400 far fa-star mr-[.1rem] mb-1"></spn>
                        @endfor

                    </div>
                </div>

                <br>
            @endforeach

            <br/>
            <br/>

            @auth
                <form action="/products/comment" class="border-2 px-4 py-8" method="post">

                    @csrf
                    <input type="hidden" name="product__id" value="{{$product->id}}"/>
                    <input type="hidden" name="category" value="{{$category}}"/>


                    <x-label for="product__comment" :value="__('Add your comments here')"/>

                    <x-input id="password" class="block mt-2 w-full"
                             type="text"
                             name="product__comment" :value="old('product__comment')"/>
                    @error('product__comment')
                    <p class="text-red-600 mt-1">{{$message}}</p>
                    @enderror

                    <div class="rating mt-4">
                        <input type="radio" name="rating" id="rating-5">
                        <label for="rating-5"></label>
                        <input type="radio" name="rating" id="rating-4">
                        <label for="rating-4"></label>
                        <input type="radio" name="rating" id="rating-3">
                        <label for="rating-3"></label>
                        <input type="radio" name="rating" id="rating-2">
                        <label for="rating-2"></label>
                        <input type="radio" name="rating" id="rating-1">
                        <label for="rating-1"></label>
                    </div>

                    <x-button class="block mt-4">Add Comments</x-button>
                </form>
            @endauth

        </div>

    @endforeach

    @if(session("comments"))
        <x-alert class="text-green-600 bg-green-200">{{__("Your comment has been added successfully.")}}</x-alert>
    @endif

</x-guest-layout>
