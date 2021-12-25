<x-guest-layout>
     <section class="books__section">
         <div class="books__section__container">
             <div class="books__banner__image bg-cover bg-center flex items-center"  style="background-image: url('/images/game.jpg'); height:75vh">
                 <div class="ml-36">
                     <h2 class="text-5xl font-extrabold leading-loose">Holiday Sale !</h2>
                     <p class="text-xl">Take advantage of these gifts during Holiday Sale and look the par this season.</p>
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
                     <option value="asc" disabled>Select</option>
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

            <div class="individual__product border-2 border-solid border-gray-200 w-full">

                <img src="/images/download.png" height="300px" class="object-cover w-full" alt="">

                <br>

                <div class="flex items-baseline justify-between mx-4">
                    <p class="text-2xl font-bold leading-9">CSGO</p>
                    <p class="text-3xl font-extrabold">$19</p>
                </div>

                <br>

                <div class="flex items-baseline justify-end mx-4">
                    <x-button class="mb-6 font-extrabold px-8 py-4 text-base">
                        {{ __('Add to Cart') }}
                    </x-button>
                </div>
            </div>


            <div style="width: 300px;" class="individual__product border-2 border-solid border-gray-200">

                <img src="/images/download.png" height="300px" class="object-cover w-full" alt="">

                <br>

                <div class="flex items-baseline justify-between mx-4">
                    <p class="text-2xl font-bold leading-9">CSGO</p>
                    <p class="text-3xl font-extrabold">$19</p>
                </div>

                <br>

                <div class="flex items-baseline justify-end mx-4">
                    <x-button class="mb-6 font-extrabold px-8 py-4 text-base">
                        {{ __('Add to Cart') }}
                    </x-button>
                </div>
            </div>


        </div>
    </section>

     <section style="height: 50vh"></section>

 </x-guest-layout>
 