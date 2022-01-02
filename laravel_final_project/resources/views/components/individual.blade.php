@props(['category'])

<div class="individual__product border-2 border-solid border-gray-200 w-full">

    <img src="/images/download.png" height="300px" class="object-cover w-full" alt="">

    <br>

    <div class="flex items-baseline justify-between mx-4 ">
        <p class="text-md font-medium text-gray-700">{{$title}}</p>
        <p class="text-md font-bold text-gray-700">${{$price}}</p>
    </div>

    <br>

    <div class="flex items-baseline justify-end mx-4 mb-6">
        <a href="/products/{{$category}}/{{$product_id}}"
           class="font-bold flex items-center text-indigo-600">
            Explore
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                 class="svg-inline--fa fa-chevron-right fa-w-0 w-2 ml-1" role="img"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path fill="currentColor"
                      d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/>
            </svg>
        </a>
    </div>
</div>
