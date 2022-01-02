@props(['first', 'second', 'third'])

<div class="flex justify-center">
    <nav class="rounded-md w-full">
        <ol class="list-reset flex font-bold">
            <li><a href="/" class="text-blue-600 hover:text-blue-700">{{$first}}</a></li>
            <li><span class="text-gray-500 mx-2">/</span></li>
            <li><a href="/products/cds" class="text-blue-600 hover:text-blue-700">{{$second}}</a></li>
            <li><span class="text-gray-500 mx-2">/</span></li>
            <li class="text-gray-500">{{$third}}</li>
        </ol>
    </nav>
</div>
