<div>
    <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40 mb-2">
        <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
            <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">
                    {{--                    <div class="relative flex items-center w-full lg:w-64 h-full group">--}}
                    {{--                        <div--}}
                    {{--                            class="absolute z-50 flex items-center justify-center block w-auto h-10 p-3 pr-2 text-sm text-gray-500 uppercase cursor-pointer sm:hidden">--}}
                    {{--                            <svg fill="none" class="relative w-5 h-5" stroke-linecap="round" stroke-linejoin="round"--}}
                    {{--                                 stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">--}}
                    {{--                                <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">--}}
                    {{--                                </path>--}}
                    {{--                            </svg>--}}
                    {{--                        </div>--}}
                    {{--                        <svg--}}
                    {{--                            class="absolute left-0 z-20 hidden w-4 h-4 ml-4 text-gray-500 pointer-events-none fill-current group-hover:text-gray-400 sm:block"--}}
                    {{--                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
                    {{--                            <path--}}
                    {{--                                d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">--}}
                    {{--                            </path>--}}
                    {{--                        </svg>--}}
                    {{--                        <input type="text"--}}
                    {{--                               class="block w-full py-1.5 pl-10 pr-4 leading-normal rounded-2xl focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 ring-opacity-90 bg-gray-100 dark:bg-gray-800 text-gray-400 aa-input"--}}
                    {{--                               placeholder="Поиск">--}}
                    {{--                        <div--}}
                    {{--                            class="absolute right-0 hidden h-auto px-2 py-1 mr-2 text-xs text-gray-400 border border-gray-300 rounded-2xl md:block">--}}
                    {{--                            +--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="grid grid-cols-2 gap-4 items-center">
                        <div class="hidden md:block">
                            <x-button icon="folder-add" primary label="Новая папка" wire:click="new_folder"/>
                        </div>
                        <div class="hidden md:block">
                            <x-button icon="document-add" positive label="Новая пин" wire:click="new_pin"/>
                        </div>
                        <div class="block md:hidden">
                            <x-button lg icon="folder-add" primary wire:click="new_folder"/>
                        </div>
                        <div class="block md:hidden">
                            <x-button lg icon="document-add" positive wire:click="new_pin"/>
                        </div>
                    </div>


                </div>
                <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                    <x-button primary wire:click="openModal">Настройки</x-button>

                </div>
            </div>
        </div>
    </header>


    <div class="mx-0 mb-10 mt-1 grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 md:gap-4 gap-y-4">

        @forelse($lessons as $key => $les)
            <div class="mb-4 mx-0  xl:mr-4 block w-full shadow-lg  items-center rounded-2xl bg-white dark:bg-gray-700">
                <div class="shadow-lg rounded-2xl  w-full ">
                    <p class="font-bold text-md pl-4 pt-2 text-black dark:text-white capitalize">
                        {{ $les['day_name'] }}
                    </p>
                    <ul>
                        @forelse($les['data'] as $day)
                            <div
                                class=" bg-gray-400 bg-opacity-40 ring-2 ring-offset-1 dark:ring-offset-2 ring-offset-gray-300 dark:ring-offset-gray-800 ring-gray-500 dark:ring-gray-700 rounded-md my-3 px-3 py-2 mx-3 text-gray-700 dark:text-white flex space-x-2 justify-between dark:bg-opacity-40 dark:bg-gray-900">
                                <div
                                    class="flex-initial text-gray-500 dark:text-gray-200 text-xs md:text-sm flex items-center justify-center py-1 px-3 font-semibold whitespace-normal md:whitespace-nowrap">
                                    {{ $lessons_time[$day['n']] }}
                                </div>
                                <div class="flex-grow"><span
                                        class="text-gray-700 dark:text-white text-xs md:text-base space-y-1 md:space-y-2">{{ $day['name'] }}{{ ', ' . $day['place'] ?? '' }}</span>
                                    <br>
                                    <span
                                        class="text-gray-500 dark:text-gray-200 text-xs md:text-sm text-sm underline">{{ $day['tuter'] }}</span>
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
