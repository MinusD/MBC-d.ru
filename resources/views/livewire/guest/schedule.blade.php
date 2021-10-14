<div class="bg-gradient-to-br from-indigo-900 to-green-900 min-h-screen overflow-auto">
    <div class="px-2 md:px-10 mt-4">
        <x-modal.card title="Выбор группы" class="z-50" blur wire:model="modal_set">
            <div class="grid grid-cols-1  gap-4">


                <x-input label="Имя группы" wire:model.lazy="modal_group_name" wire:keydown.enter="save"/>
                @if($search_error)
                    <span class="text-red-600">Ошибка поиска группы</span>
                @endif
                <p><span class="font-bold">Важно! </span>Название группы должно быть в таком же формате, как и в
                    расаписании (Например: <code>ИКБО-30-21)</code></p>

            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button flat negative/>

                    <div class="flex">
                        <x-button flat label="Отменить" x-on:click="close"/>
                        <x-button primary label="Сохранить" wire:click="save"/>
                    </div>
                </div>
            </x-slot>
        </x-modal.card>
        <header
            class="block w-full shadow-lg bg-indigo-900 bg-opacity-40 items-center h-16 rounded-2xl z-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700">
            <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
                <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                    <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">
                        <style>
                            @import url('https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap');
                        </style>
                        <a href="{{ route('landing.home') }}">
                            <span class="text-3xl dark:text-gray-100 font-semibold text-white ml-3"><span
                                    class="font-bold" style="font-family: 'Otomanopee One', sans-serif;">MBC</span> Studio</span>
                        </a>
                    </div>

                    {{-- ШЕСТЕРЁНКА--}}
                    <div
                        class="flex relative p-1  items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">


                        {{--                        <div class="flex sm:items-center sm:ml-6">--}}
                        {{--                            <div class="relative">--}}
                        {{--                                <div class="relative">--}}

                        {{--                                    <div>--}}
                        {{--                                        <button type="button" wire:click="openSetModal"--}}
                        {{--                                                class="flex justify-center p-2  transition duration-150 ease-in-out border border-transparent rounded-md text-gray-200 lg:dark:bg-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:bg-gray-50  hover:text-gray-700 dark:focus:bg-gray-700 ">--}}
                        {{--                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"--}}
                        {{--                                                 viewBox="0 0 24 24" stroke="currentColor">--}}
                        {{--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
                        {{--                                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>--}}
                        {{--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
                        {{--                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>--}}
                        {{--                                            </svg>--}}
                        {{--                                        </button>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="relative">
                                <div class="relative">
                                    <div>
                                        <span
                                            class="inline-flex rounded-md shadow-lg bg-indigo-900 bg-opacity-40 items-center rounded-2xl  ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700">
                                            <ul class="flex">

                                <li class="mx-1 ml-3 py-1 cursor-pointer" wire:click="previous_week">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300"
                                             fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                                        </svg>
                                </li>
                                <li class="mx-1 px-3 py-1 rounded-lg cursor-pointer" wire:click="current_week">
                                    <a class="flex items-center font-bold" href="#">
                                        <span class="mx-1 text-gray-300">Неделя {{ $show_week }}</span>
                                    </a>
                                </li>
                                <li class="mx-1 pr-3 py-1 cursor-pointer" wire:click="next_week">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 rotate-180"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                                    </svg>
                                </li>
{{--                                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">--}}
                                                {{--                                    <a class="font-bold" href="#">3</a>--}}
                                                {{--                                </li>--}}
                                                {{--                                <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">--}}
                                                {{--                                    <a class="flex items-center font-bold" href="#">--}}
                                                {{--                                        <span class="mx-1">Next</span>--}}
                                                {{--                                    </a>--}}
                                                {{--                                </li>--}}
                            </ul>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex sm:items-center sm:ml-6">
                            <div class="relative">
                                <div class="relative">
                                    <div>
                                        <button type="button" wire:click="openSetModal"
                                                class="flex justify-center p-2  transition duration-150 ease-in-out border border-transparent rounded-md text-gray-200 lg:dark:bg-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:bg-gray-50  hover:text-gray-700 dark:focus:bg-gray-700 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  Конец шестерёнки--}}

                </div>
            </div>
        </header>
    </div>
    <div
        class="block sm:hidden shadow-lg bg-indigo-900 bg-opacity-40 items-center  rounded-2xl z-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mx-2 mt-4">
        <div class="relative">
            <div class="grid grid-cols-3 ">
                <div class="mx-1 ml-3 py-1 cursor-pointer flex items-center justify-center" wire:click="previous_week">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300"
                         fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                    </svg>
                </div>
                <div class="mx-1 px-3 py-1 rounded-lg cursor-pointer flex items-center justify-center" wire:click="current_week">
                    <a class="flex items-center font-bold" href="#">
                        <span class="mx-1 text-gray-300">Неделя {{ $show_week }}</span>
                    </a>
                </div>
                <div class="mx-1 pr-3 py-1 cursor-pointer flex items-center justify-center" wire:click="next_week">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 rotate-180"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-2 md:mx-10 mb-10 mt-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 md:gap-4 gap-y-4">

        @forelse($lessons as $key => $les)
            <div
                class="block w-full shadow-lg  items-center rounded-2xl z-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 p-4 w-full @if($key == $current_day) bg-gradient-to-br from-indigo-700 to-green-600 @else bg-indigo-900 bg-opacity-40 @endif">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex flex-col">
                            <span class="font-bold text-2xl text-white ml-2 capitalize">{{ $les['day_name'] }}</span>
                        </div>
                    </div>
                </div>
                @forelse($les['data'] as $day)
                    <div
                        class="bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between">
                        <div
                            class="flex-initial text-gray-200 text-xs md:text-sm flex items-center justify-center py-1 px-3 font-semibold whitespace-normal md:whitespace-nowrap">
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
                @empty
                    <div
                        class="flex items-center justify-center text-center bg-indigo-900 bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 rounded-md my-3 px-3 py-2 w-full text-white flex space-x-2 justify-between h-auto">
                        <div class=" ">В этот день пар нет :)</div>
                    </div>
                @endforelse

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
            </div>
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


    {{--    {{ dd($view_groups) }}--}}
</div>
