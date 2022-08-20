<div class="mbc-gradient-background">
    <div class="mbc-near-header-card-out">
        <x-modal.card title="Выбор группы" class="z-50" blur wire:model="modal_set">
            <div class="grid grid-cols-1  gap-4">


                <x-input label="Имя группы" wire:model.lazy="modal_group_name" wire:keydown.enter="save"/>
                @if($search_error)
                    <span class="text-red-600">Ошибка поиска группы</span>
                @endif
                @if(mb_strlen($previous_group > 3))
                    <x-button info wire:click="get_previous_group">Вернуть расписание
                        группы {{ $previous_group ?? "не найдено"}}</x-button>
                @endif
                <p><span class="font-bold">Важно! </span>Название группы должно быть в таком же формате, как и в
                    расаписании (Например: <code>ИКБО-30-21</code>)</p>

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
        <header class="mbc-header-cyan-ring">
            <div class="mbc-header-ring-flex">
                <div class="mbc-header-ring-flex-in">
                    <div class="mbc-header-logo">
                        <style>
                            @import url('https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap');
                            @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
                        </style>
                        <a href="{{ route('landing.home') }}">
                            <span class="text-3xl dark:text-gray-100 font-semibold text-white ml-3"><span
                                    class="font-bold" style="font-family: 'Otomanopee One', sans-serif;">MBC</span> Studio</span>
                        </a>
                    </div>
                    <div class="mbc-header-schedule-group-name">{{ $g ?? '' }}</div>
                    {{-- ШЕСТЕРЁНКА--}}
                    <div
                        class="mbc-header-schedule-gear">
                        @if($show_week > -1)
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
                            </ul>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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
    @if($show_week > -1)
        <div class="mbc-near-header-card-out lg:hidden">
            <div
                class="block w-full shadow-lg bg-indigo-900 bg-opacity-40 items-center h-6 rounded-md z-38 ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5">
                <div>
                    <div class="flex flex items-center justify-center">
                        <div class="text-md font-semibold text-gray-100">
                            Расписание группы <span
                                class="font-bold" style="font-family: 'Lobster', cursive;">{{ $g ?? '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="mbc-header-mobile-week-picker">
            <div class="relative">
                <div class="grid grid-cols-3 ">
                    <div class="mbc-header-mobile-week-picker-component ml-3 "
                         wire:click="previous_week">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300"
                             fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                    </div>
                    <div class="mbc-header-mobile-week-picker-component rounded-lg px-3"
                         wire:click="current_week">
                        <a class="flex items-center font-bold" href="#">
                            <span class="mx-1 text-gray-300">Неделя {{ $show_week }}</span>
                        </a>
                    </div>
                    <div class="mbc-header-mobile-week-picker-component pr-3" wire:click="next_week">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 rotate-180"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($api_error)
        <div class="mbc-near-header-card-out">
            <div class="mbc-schedule-api-error-card">
                <div class="mbc-schedule-near-header-card-text text-3xl">
                    <div class="mt-3">Ошибка API</div>
                </div>
            </div>
        </div>
    @endif
    <div class="mbc-near-header-card-out">
        <a
            href="{{ route('guest.new-schedule') }}"
            class="mbc-schedule-near-header-card-base ring-offset-yellow-600 ring-yellow-500">
            <div>
                <div class="mbc-schedule-near-header-card-text">
                    Попробуй новый дизайн расписания!
                </div>
            </div>
        </a>
    </div>
    @if(env('IS_DISTANT'))
        <div class="mbc-near-header-card-out">
            <div
                class="mbc-schedule-near-header-card-base ring-offset-blue-800 ring-cyan-700">
                <div>
                    <div class="flex flex items-center justify-center">
                        <div class="text-md font-semibold text-gray-100">
                            Все пары проходят в дистанционном формате
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="mbc-schedule-grid">
        @forelse($lessons as $key => $les)
            <div
                class="mbc-schedule-day-card-base @if($key == $current_day && $show_week == $current_week) mbc-schedule-day-card-current @endif">
                {{--                                <div class="-mt-3 text-gray-200 font-semibold text-sm  ml-2 right-2">2021-11-09</div>--}}
                {{--                <div class="flex items-center justify-between mb-3">--}}
                {{--                    <div class="mbc-flex-center">--}}
                {{--                        <div class="mbc-flex-col">--}}
                <div
                    class="mbc-schedule-gradient-day-name">{{ $les['day_name'] }} <span
                        class="mbc-schedule-gradient-date">{{ date("d.m.Y", $show_date) }}</span></div>
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                @php($show_date =  strtotime('+1 day', $show_date))
                @forelse($les['data'] as $day)
                    <div
                        class="mbc-schedule-gradient-lesson-card">
                        <div
                            class="mbc-schedule-gradient-lesson-card-time">
                            {{ mb_substr($lessons_time[$day['n']], 0, 5) }}<br>
                            {{ mb_substr($lessons_time[$day['n']],-6, -1) . '0' }}
                        </div>
                        <div class="flex-grow"><span
                                class="mbc-schedule-gradient-lesson-card-subject">{{ $day['name'] }}{{ !env('IS_DISTANT') ? (', ' . $day['place'] ?? '') : '' }}</span>
                            <br>
                            <a href="{{ route('landing.services.teachers_info') . '?t=' . $day['tuter']}}"
                               target="_blank">
                            <span
                                class="mbc-schedule-gradient-lesson-card-tuter">{{ $day['tuter'] }}</span>
                            </a>
                        </div>
                        <div class="mbc-schedule-gradient-lesson-card-place">
                            @if($day['type'] == 'пр')
                                <button
                                    class="mbc-schedule-gradient-lesson-card-place-icon mbc-schedule-gradient-lesson-card-place-icon-green">
                                    <span class="font-normal md:font-bold md:uppercase">пр</span>
                                </button>
                            @elseif($day['type'] == 'лк')
                                <button
                                    class="mbc-schedule-gradient-lesson-card-place-icon mbc-schedule-gradient-lesson-card-place-icon-red">
                                    <span class="font-normal md:font-bold md:uppercase">лк</span>
                                </button>
                            @else
                                <button
                                    class="mbc-schedule-gradient-lesson-card-place-icon mbc-schedule-gradient-lesson-card-place-icon-indigo">
                                    <span class="font-normal md:font-bold md:uppercase">лаб</span>
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div
                        class="mbc-schedule-gradient-lesson-card-empty ">
                        <div class=" ">В этот день пар нет :)</div>
                    </div>
                @endforelse
            </div>
        @empty
        @endforelse
    </div>
</div>
