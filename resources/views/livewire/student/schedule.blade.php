<div>
    <div class="mx-2  mb-10 mt-1 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 md:gap-4 gap-y-4">

        @forelse($lessons as $key => $les)
            <div class="mb-4 mx-0 sm:ml-4 xl:mr-4 block w-full shadow-lg  items-center rounded-2xl bg-white dark:bg-gray-700">
                <div class="shadow-lg rounded-2xl  w-full ">

                    <p class="font-bold text-md pl-4 p-2 text-black dark:text-white capitalize">
                        {{ $les['day_name'] }}
                    </p>
                    <ul>
                        @forelse($les['data'] as $day)
                            <div
                                class="bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between">
                                <div
                                    class="flex-initial text-gray-200 text-xs md:text-sm flex items-center justify-center py-1 px-3 font-semibold">
                                    {{ $lessons_time[$day['n']] }}
                                </div>
                                <div class="flex-grow"><span
                                        class="text-white text-xs md:text-base space-y-1 md:space-y-2">{{ $day['name'] }}{{ ', ' . $day['place'] ?? '' }}</span>
                                    <br>
                                    <span class="text-gray-200 text-xs md:text-sm text-sm underline">{{ $day['tuter'] }}</span>
                                </div>
                                <div class="flex-initial order-last flex items-center justify-center">
                                    @if($day['type'] == 'пр')
                                        <button
                                            class="flex-no-shrink bg-green-500 hover:bg-green-500 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">
                                            <span class="font-normal md:font-bold md:uppercase">пр</span>
                                        </button>
                                    @elseif($day['type'] == 'лк')
                                        <button
                                            class="flex-no-shrink bg-red-500 hover:bg-red-600 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-red-400 hover:border-red-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">
                                            <span class="font-normal md:font-bold md:uppercase">лк</span>
                                        </button>
                                    @else
                                        <button
                                            class="flex-no-shrink bg-indigo-500 hover:bg-indigo-600 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-indigo-400 hover:border-indigo-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">
                                            <span class="font-normal md:font-bold md:uppercase">лаб</span>
                                        </button>
                                    @endif
                                </div>
                            </div>



{{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
{{--                                <div class="flex items-center justify-start text-sm">--}}
{{--                                    <div class="px-4">--}}
{{--                                        <span class="">{{ $lessons_time[$day['n']] }} </span>--}}
{{--                                        <span> {{ $day['name'] }}{{ ', ' . $day['place'] ?? '' }} </span>--}}
{{--                                        <br>--}}

{{--                                        <span--}}
{{--                                            class="text-gray-200 text-xs md:text-sm text-sm underline ml-10">{{ $day['tuter'] }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024"--}}
{{--                                     class="text-green-500 mx-4">--}}
{{--                                    <path--}}
{{--                                        d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z"--}}
{{--                                        fill="currentColor">--}}
{{--                                    </path>--}}
{{--                                </svg>--}}

{{--                            </li>--}}
                        @empty
                            <div
                                class="flex items-center justify-center text-center text-gray-600  bg-indigo-300 font-bold dark:text-gray-500 dark:bg-gray-100 h-10 my-5 mx-2 rounded-md">
                                <div class=" ">В этот день пар нет :)</div>
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>


{{--            <div--}}
{{--                class="block w-full shadow-lg  items-center rounded-2xl z-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 p-4 w-full @if($key == $current_day) bg-gradient-to-br from-indigo-700 to-green-600 @else bg-indigo-900 bg-opacity-40 @endif">--}}
{{--                <div class="flex items-center justify-between mb-3">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <span class="font-bold text-2xl text-white ml-2 capitalize">{{ $les['day_name'] }}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @forelse($les['data'] as $day)--}}
{{--                    <div--}}
{{--                        class="bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between">--}}
{{--                        <div--}}
{{--                            class="flex-initial text-gray-200 text-xs md:text-sm flex items-center justify-center py-1 px-3 font-semibold">--}}
{{--                            {{ $lessons_time[$day['n']] }}--}}
{{--                        </div>--}}
{{--                        <div class="flex-grow"><span--}}
{{--                                class="text-white text-xs md:text-base space-y-1 md:space-y-2">{{ $day['name'] }}{{ ', ' . $day['place'] ?? '' }}</span>--}}
{{--                            <br>--}}
{{--                            <span class="text-gray-200 text-xs md:text-sm text-sm underline">{{ $day['tuter'] }}</span>--}}
{{--                        </div>--}}
{{--                        <div class="flex-initial order-last flex items-center justify-center">--}}
{{--                            @if($day['type'] == 'пр')--}}
{{--                                <button--}}
{{--                                    class="flex-no-shrink bg-green-500 hover:bg-green-500 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">--}}
{{--                                    <span class="font-normal md:font-bold md:uppercase">пр</span>--}}
{{--                                </button>--}}
{{--                            @elseif($day['type'] == 'лк')--}}
{{--                                <button--}}
{{--                                    class="flex-no-shrink bg-red-500 hover:bg-red-600 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-red-400 hover:border-red-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">--}}
{{--                                    <span class="font-normal md:font-bold md:uppercase">лк</span>--}}
{{--                                </button>--}}
{{--                            @else--}}
{{--                                <button--}}
{{--                                    class="flex-no-shrink bg-indigo-500 hover:bg-indigo-600 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-indigo-400 hover:border-indigo-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">--}}
{{--                                    <span class="font-normal md:font-bold md:uppercase">лаб</span>--}}
{{--                                </button>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @empty--}}
{{--                    <div--}}
{{--                        class="flex items-center justify-center text-center bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between h-auto">--}}
{{--                        <div class=" ">В этот день пар нет :)</div>--}}
{{--                    </div>--}}
{{--                @endforelse--}}

{{--                --}}{{--            <div--}}
{{--                --}}{{--                class="bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between">--}}
{{--                --}}{{--                <div--}}
{{--                --}}{{--                    class="flex-initial text-gray-200 text-xs md:text-sm flex items-center justify-center py-1 px-3 font-semibold">--}}
{{--                --}}{{--                    14:20 – 15:50--}}
{{--                --}}{{--                </div>--}}
{{--                --}}{{--                <div class="flex-grow"><span--}}
{{--                --}}{{--                        class="text-white text-xs md:text-base space-y-1 md:space-y-2">Физика, Д</span>--}}
{{--                --}}{{--                    <br>--}}
{{--                --}}{{--                    <span class="text-gray-200 text-xs md:text-sm text-sm underline">Сафронов А.А.</span>--}}
{{--                --}}{{--                </div>--}}
{{--                --}}{{--                <div class="flex-initial order-last flex items-center justify-center">--}}
{{--                --}}{{--                    <button--}}
{{--                --}}{{--                        class="flex-no-shrink bg-green-500 hover:bg-green-500 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">--}}
{{--                --}}{{--                        <span class="font-normal md:font-bold md:uppercase">пр</span>--}}
{{--                --}}{{--                    </button>--}}
{{--                --}}{{--                </div>--}}
{{--                --}}{{--            </div>--}}
{{--            </div>--}}
        @empty

        @endforelse

        {{--        <div--}}
        {{--            class="block w-full shadow-lg bg-indigo-900 bg-opacity-40 items-center rounded-2xl z-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 p-4 w-full">--}}
        {{--            <div class="flex items-center justify-between mb-3">--}}
        {{--                <div class="flex items-center">--}}
        {{--                    <div class="flex flex-col">--}}
        {{--                        <span class="font-bold text-2xl text-white ml-2">Понедельник</span>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div--}}
        {{--                class="bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between">--}}
        {{--                <div--}}
        {{--                    class="flex-initial text-gray-200 text-xs md:text-sm flex items-center justify-center py-1 px-3 font-semibold">--}}
        {{--                    10:40 - 12:10--}}
        {{--                </div>--}}
        {{--                <div class="flex-grow"><span class="text-white text-xs md:text-base space-y-1 md:space-y-2">История (история России, всеобщая история), Д</span>--}}
        {{--                    <br>--}}
        {{--                    <span class="text-gray-200 text-xs md:text-sm text-sm underline">Назаров А.А.</span>--}}
        {{--                </div>--}}
        {{--                <div class="flex-initial order-last flex items-center justify-center">--}}
        {{--                    <button--}}
        {{--                        class="flex-no-shrink bg-green-500 hover:bg-green-500 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">--}}
        {{--                        <span class="font-normal md:font-bold md:uppercase">пр</span>--}}
        {{--                    </button>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div--}}
        {{--                class="bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between">--}}
        {{--                <div--}}
        {{--                    class="flex-initial text-gray-200 text-xs md:text-sm flex items-center justify-center py-1 px-3 font-semibold">--}}
        {{--                    14:20 – 15:50--}}
        {{--                </div>--}}
        {{--                <div class="flex-grow"><span--}}
        {{--                        class="text-white text-xs md:text-base space-y-1 md:space-y-2">Физика, Д</span>--}}
        {{--                    <br>--}}
        {{--                    <span class="text-gray-200 text-xs md:text-sm text-sm underline">Сафронов А.А.</span>--}}
        {{--                </div>--}}
        {{--                <div class="flex-initial order-last flex items-center justify-center">--}}
        {{--                    <button--}}
        {{--                        class="flex-no-shrink bg-green-500 hover:bg-green-500 px-1 md:px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-xl md:rounded-full transition ease-in duration-300">--}}
        {{--                        <span class="font-normal md:font-bold md:uppercase">пр</span>--}}
        {{--                    </button>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--            --}}{{--            <div--}}
        {{--            --}}{{--                class="bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between">--}}
        {{--            --}}{{--                <div--}}
        {{--            --}}{{--                    class="flex-initial text-gray-200 text-sm flex items-center justify-center py-1 px-3 font-semibold">--}}
        {{--            --}}{{--                    12:40 – 14:10--}}
        {{--            --}}{{--                </div>--}}
        {{--            --}}{{--                <div class="flex-grow"><span class="text-white">Физика</span>--}}
        {{--            --}}{{--                    <br>--}}
        {{--            --}}{{--                    <span class="text-gray-200 text-sm underline">Сафронов А.А.</span>--}}
        {{--            --}}{{--                </div>--}}
        {{--            --}}{{--                <div class="flex-initial flex items-center justify-center">--}}
        {{--            --}}{{--                    <button--}}
        {{--            --}}{{--                        class="order-last flex-no-shrink bg-green-500 hover:bg-green-500 px-2 bg-opacity-75 ml-4 py-0.5 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">--}}
        {{--            --}}{{--                       <span class="font-bold">ПР</span>--}}
        {{--            --}}{{--                    </button>--}}
        {{--            --}}{{--                </div>--}}
        {{--            --}}{{--            </div>--}}


        {{--        </div>--}}

    </div>
</div>
