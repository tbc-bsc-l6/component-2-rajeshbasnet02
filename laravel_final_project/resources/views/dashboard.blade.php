<x-app-layout>

    <section class="list__products__section">

        @if(session()->has("login__success"))

            <x-alert class="bg-green-200 text-green-600">
                {{__("Login Successfull !")}}
            </x-alert>

        @elseif(session()->has("add__product"))

            <x-alert class="bg-green-200 text-green-600 ">
                {{__("Product have been added successfully !")}}
            </x-alert>

        @elseif(session()->has("update__product"))

            <x-alert class="bg-green-200 text-green-600 ">
                {{__("Product have been updated successfully !")}}
            </x-alert>

        @elseif(session()->has("delete__product"))

            <x-alert class="text-red-600 bg-red-200">
                {{__("Product have been deleted successfully !")}}
            </x-alert>

        @endif

        <div class="w-[80%] mx-auto">
            <div class="list__products__section__container mt-10 overflow-x-scroll">
                <div class="add__products__button w-full flex items-center justify-between">

                    <div class="flex justify-center">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex font-bold">
                                <li><a href="/" class="text-indigo-600 hover:text-indigo-400">Home</a></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>

                                @cannotadmin
                                <li class="text-gray-500">Products</li>
                                @endcannotadmin

                                @admin
                                <li class="text-gray-500">Users</li>
                                @endadmin

                            </ol>
                        </nav>
                    </div>

                    @cannotadmin
                    <x-button>
                        <a href="/products">
                            {{__("Add Product")}}
                        </a>
                    </x-button>
                    @endcannotadmin

                </div>

                <br/>

                <table class="min-w-full">
                    @admin
                    <x-table-head :first="__('Firstname')" :second="__('Lastname')" :third="__('Email')"
                                  :fourth="__('Created At')"></x-table-head>
                    @endadmin

                    @cannotadmin
                    <x-table-head :first="__('Title')" :second="__('Author')" :third="__('Price')"
                                  :fourth="__('Category')"></x-table-head>
                    @endcannotadmin


                    <tbody>

                    @if(auth()->user()?->can('admin'))

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

            @admin
            {{$users->links()}}
            @endadmin

            @cannotadmin
            {{$userProd->links()}}
            @endcannotadmin

        </div>
    </section>

</x-app-layout>
