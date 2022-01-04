<table class="min-w-full">
    <thead class="bg-gray-50 dark:bg-gray-700">
    <tr>
        <th scope="col"
            class="py-3 font-bold px-6 text-center text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
            {{$first}}
        </th>
        <th scope="col"
            class="py-3 font-bold px-6 text-center text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
            {{$second}}
        </th>
        <th scope="col"
            class="py-3 font-bold px-6 text-center text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
            {{$third}}
        </th>
        <th scope="col"
            class="py-3 font-bold px-6 text-center text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
            {{$fourth}}
        </th>

        @if(auth()->user()?->cannot('admin'))

            <th scope="col"
                class="py-3 font-bold px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                Action
            </th>

            <th scope="col"
                class="py-3 font-bold px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                Action
            </th>
        @endif

    </tr>
    </thead>
