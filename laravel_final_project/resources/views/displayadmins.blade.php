<x-app-layout>

    <section class="list__products__section">

        <div class="w-[80%] mx-auto">
            <div class="list__products__section__container mt-10 overflow-x-scroll">
                <div class="add__products__button w-full flex items-center justify-between">

                    <div class="flex justify-center">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex font-bold">
                                <li><a href="{{route("homepage")}}" class="text-indigo-600 hover:text-indigo-400">Home</a></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Admins</li>
                            </ol>
                        </nav>
                    </div>

                    <p class="text-sm"><span class="text-red-600">Admin Note</span> : More feature are soon going to be
                        added that includes giving admin privilege to users.</p>

                </div>

                <br/>

                <table class="min-w-full">
                    <x-table-head :first="__('Firstname')" :second="__('Lastname')" :third="__('Email')"
                                  :fourth="__('Created At')"></x-table-head>

                    <tbody>

                    @foreach($users as $user)

                        <x-table-body>
                            <x-slot name="firstname">
                                {{$user->firstname}}
                            </x-slot>

                            <x-slot name="author">
                                {{$user->lastname}}
                            </x-slot>

                            <x-slot name="price">
                                {{$user->email}}
                            </x-slot>

                            <x-slot name="category">
                                {{$user->created_at ?? "----"}}
                            </x-slot>

                        </x-table-body>

                    @endforeach

                    </tbody>
                </table>
            </div>

            <br/>

            @superadmin
            {{$users->links()}}
            @endsuperadmin

        </div>
    </section>

</x-app-layout>
