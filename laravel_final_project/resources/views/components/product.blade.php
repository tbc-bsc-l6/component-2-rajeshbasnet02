@props(['desc', 'button', 'method'])

<section class="form__section w-full h-[100vh] bg-gray-100">
    <div class="form__container mx-auto flex justify-center items-center h-full w-[50%]">

        <div class="w-full bg-white px-20 pt-8 rounded-lg">
            <p class="mb-4 text-right text-blue-600 font-bold uppercase">
                {{$desc}}
            </p>

            <form method="POST" action="{{$action ?? route("dashboard")}}" >
                @csrf
                @method("$method")

                {{$slot}}

                <div class="flex items-center justify-end mt-8 mb-8">
                    <x-button class="ml-3">
                        {{$button}}
                    </x-button>
                </div>
            </form>
        </div>

    </div>
</section>


