<section class="form__section">
    <div style="height: 80vh; width: 40%;" class="form__container mx-auto flex justify-center items-center">

        <form method="POST" action="{{$action ?? "/dashboard"}}" class="w-full bg-gray-50 px-12 py-8 rounded-lg">
            @csrf

            {{$slot}}

            <div class="flex items-center justify-end mt-8">
                <x-button class="ml-3">
                    {{$btn__name}}
                </x-button>
            </div>
        </form>

    </div>
</section>

<section class="ellipse__bg__section">
    <div style="z-index: -1;" class="md__ellipse absolute top-0 opacity-20">
        <img
            src="https://raw.githubusercontent.com/developedbyed/laptop-ui/1d8f50e5e129ded5accc2d6b7bb8e934ed6fb74b/img/mid-eclipse.svg"
            alt="">
    </div>

    <div style="z-index: -1;" class="lg__ellipse absolute right-0 top-0 opacity-10">
        <img
            src="https://raw.githubusercontent.com/developedbyed/laptop-ui/1d8f50e5e129ded5accc2d6b7bb8e934ed6fb74b/img/big-eclipse.svg"
            alt="">
    </div>
</section>

