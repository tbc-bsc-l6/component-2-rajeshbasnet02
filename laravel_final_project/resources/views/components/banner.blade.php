@props(['category', 'description', 'event'])

<section class="prods__section">
    <div class="prods__section__container">
        <div class="banner__image bg-cover bg-center flex items-center h-[75vh]"
             style="background-image: url('/images/{{$category ?? ""}}.jpg');">
            <div class="ml-36">
                <h2 class="text-5xl font-black leading-loose">{{$event ?? "Holiday Sale !"}}</h2>
                <p class="text-xl">{{$description ?? "Take advantage of these gifts during Holiday Sale and look the par this
                    season"}}</p>
                <br>
                <x-button class="py-3 px-8">
                    {{ __('Visit Store') }}
                </x-button>
            </div>
        </div>
    </div>
</section>
