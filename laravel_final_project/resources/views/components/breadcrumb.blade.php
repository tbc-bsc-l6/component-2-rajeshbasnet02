@props(['first', 'second', 'third'])

<div class="breadcrumb__section flex justify-left">
    <nav class="rounded-md">
        <ol class="list-reset flex font-bold">
            <li><a href="/" class="text-indigo-600 hover:text-indigo-400">{{$first}}</a></li>
            <li><span class="text-gray-500 mx-2">/</span></li>
            <li><a href="/products/{{$second}}" class="text-indigo-600 hover:text-indigo-400">{{ucfirst($second)}}</a></li>
            <li><span class="text-gray-500 mx-2">/</span></li>
            <li class="text-gray-500">{{$third}}</li>
        </ol>
    </nav>
</div>
