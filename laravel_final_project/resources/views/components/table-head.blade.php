<table class="min-w-full">
    <thead class="bg-gray-50 bg-gray-700">
    <tr>
        <th scope="col"
            class="py-3 font-bold px-6 text-center text-xs font-medium tracking-wider text-left text-gray-700 uppercase text-white">
            {{$first}}
        </th>
        <th scope="col"
            class="py-3 font-bold px-6 text-center text-xs font-medium tracking-wider text-left text-gray-700 uppercase text-white">
            {{$second}}
        </th>
        <th scope="col"
            class="py-3 font-bold px-6 text-center text-xs font-medium tracking-wider text-left text-gray-700 uppercase text-white">
            {{$third}}
        </th>
        <th scope="col"
            class="py-3 font-bold px-6 text-center text-xs font-medium tracking-wider text-left text-gray-700 uppercase text-white">
            {{$fourth}}
        </th>

        @if(auth()->user()?->cannot('superadmin'))

            <th scope="col"
                class="py-3 font-bold px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase text-white">
                Action
            </th>

            <th scope="col"
                class="py-3 font-bold px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase text-white">
                Action
            </th>
        @endif

    </tr>
    </thead>
