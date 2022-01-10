<tr class="bg-white border-b bg-gray-800 border-gray-700 hover:bg-gray-700">
    <td class="py-4 px-6 text-center text-sm text-gray-200 whitespace-nowrap text-white">
        {{ucwords($title ?? $firstname)}}
    </td>
    <td class="py-4 px-6 text-center text-sm text-gray-200 whitespace-nowrap text-white">
        {{$author ?? $lastname}}
    </td>
    <td class="py-4 px-6 text-center text-sm text-gray-200 whitespace-nowrap text-white">
        {{$price ?? $email}}
    </td>
    <td class="py-4 px-6 text-center text-sm text-gray-200 whitespace-nowrap text-white">
        {{strtoupper($category) ?? $date}}
    </td>

    @if(auth()->user()?->cannot('superadmin'))

        <td class="py-4 px-6 text-sm whitespace-nowrap">
            <a href="/products/{{$productid}}/update"
               class="text-blue-600 hover:text-blue-900 text-blue-500 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400 text"
                     fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </a>
        </td>

        <td class="py-4 px-6 text-sm whitespace-nowrap">
            <form action="/products/{{$productid}}/delete" method="post">
                @csrf
                @method("delete")
                <button type="submit"
                   class="text-blue-600 hover:text-blue-900 text-blue-500 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </form>
        </td>
    @endif


</tr>
