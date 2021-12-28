<x-app-layout>

    <section class="list__products__section">
        <div style="width: 80%" class="list__products__section__container mx-auto mt-10 overflow-x-scroll">

            <div class="add__products__button w-full flex justify-end">
                <x-button>
                    {{__("Add Product")}}
                </x-button>
            </div>

            <br>

            <table class="min-w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                        Color
                    </th>
                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                        Category
                    </th>
                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                        Price
                    </th>

                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                        Price
                    </th>

                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                        Price
                    </th>

                </tr>
                </thead>
                <tbody>
                <!-- Product 1 -->
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Apple MacBook Pro 17"
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white">
                        Sliver
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white">
                        Laptop
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white">
                        $2999
                    </td>

                    <td class="py-4 px-6 text-sm font-medium  whitespace-nowrap">
                        <a href="#" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>

                    <td class="py-4 px-6 text-sm font-medium  whitespace-nowrap">
                        <a href="#" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </section>


    <!--Give a flash message in here--->
    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                <div class="p-6 bg-white border-b border-gray-200">--}}
    {{--                    You're logged in!--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

</x-app-layout>
