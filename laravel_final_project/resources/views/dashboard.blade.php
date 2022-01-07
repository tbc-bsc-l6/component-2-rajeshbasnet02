<x-app-layout>

    <section class="list__products__section">

        @if(session()->has("login__success"))

            <x-alert class="bg-green-200 text-green-600 py-4">
                {{__("Login Successfull !")}}
            </x-alert>

        @elseif(session()->has("register__success"))

            <x-alert class="bg-green-200 text-green-600 py-4">
                {{__("You have been registered successfully !")}}
            </x-alert>

        @elseif(session()->has("add__product"))

            <x-alert class="bg-green-200 text-green-600 py-4">
                {{__("Product has been added successfully !")}}
            </x-alert>

        @elseif(session()->has("update__product"))

            <x-alert class="bg-green-200 text-green-600 py-4">
                {{__("Product has been updated successfully !")}}
            </x-alert>

        @elseif(session()->has("delete__product"))

            <x-alert class="text-red-600 bg-red-200 py-4">
                {{__("Product has been deleted successfully !")}}
            </x-alert>

        @endif

        <div class="w-[80%] mx-auto">
            <div class="list__products__section__container mt-10 overflow-x-scroll">
                <div class="add__products__button w-full flex items-center justify-between">

                    <div class="flex justify-center">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex font-bold">
                                <li><a href="{{route("homepage")}}" class="text-indigo-600 hover:text-indigo-400">Home</a></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>

                                @if(auth()->user()->cannot('admin'))
                                    @auth
                                        <li class="text-gray-500">Products</li>
                                    @endauth
                                @endif

                                @cdadmin
                                <li class="text-gray-500">Cds</li>
                                @endcdadmin

                                @gameadmin
                                <li class="text-gray-500">Games</li>
                                @endgameadmin

                                @bookadmin
                                <li class="text-gray-500">Books</li>
                                @endbookadmin

                                @superadmin
                                <li class="text-gray-500">Users</li>
                                @endsuperadmin

                            </ol>
                        </nav>
                    </div>


                    @cannotadmin
                        <a href="{{route("addproductspage")}}">
                            <x-button>
                            {{__("Add Product")}}
                            </x-button>
                        </a>
                    @endcannotadmin

                    @subadmins
                    <p class="text-sm"><span class="text-red-600">Admin Note</span> : You can <span
                            class="text-red-600">update / delete</span> products if there is some <span
                            class="text-red-600">irregularity</span> in products.</p>
                    @endsubadmins

                </div>

                <br/>

                <table class="min-w-full">
                    @superadmin
                    <x-table-head :first="__('Firstname')" :second="__('Lastname')" :third="__('Email')"
                                  :fourth="__('Created At')"></x-table-head>
                    @endsuperadmin

                    @cannotsuperadmin
                    <x-table-head :first="__('Title')" :second="__('Author')" :third="__('Price')"
                                  :fourth="__('Category')"></x-table-head>
                    @endcannotsuperadmin


                    <tbody>

                    @if(auth()->user()?->can('superadmin'))

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

                    @else
                        @foreach($userProd as $prod)

                            <x-table-body>
                                <x-slot name="title">
                                    {{$prod->product_title}}
                                </x-slot>

                                <x-slot name="author">
                                    {{$prod->product_author}}
                                </x-slot>

                                <x-slot name="price">
                                    {{"$" . $prod->price}}
                                </x-slot>

                                <x-slot name="category">
                                    {{$prod->category->product_category}}
                                </x-slot>

                                <x-slot name="productid">
                                    {{$prod->id}}
                                </x-slot>
                            </x-table-body>

                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>

            <br/>

            @superadmin
            {{$users->links()}}
            @endsuperadmin

            @cannotsuperadmin
            {{$userProd->links()}}
            @endcannotsuperadmin

        </div>
    </section>

</x-app-layout>
