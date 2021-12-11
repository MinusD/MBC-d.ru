<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Статистика проект
    </span>
</x-slot>

<header
    class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-10 md:h-16 rounded-md md:rounded-2xl z-40 mb-2">
    <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
        <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
            <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">

                <div class="relative flex items-center w-full lg:w-64 h-full group">
                    <div class="mt-2">
                        <label>
                            <select
                                class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500
                            border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 block w-full
                            sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm cursor-pointer overflow-hidden
                            dark:text-secondary-400 mb-2"
                                wire:model="time"
                            >
                                <option label="Час" value="1" selected/>
                                <option label="Сутки" value="2"/>
                                <option label="Неделя" value="3"/>
                                <option label="Месяц" value="4"/>
                                <option label="Всё время" value="5"/>

                            </select>
                        </label>
                    </div>

                </div>

                <div class="grid grid-cols-2 gap-4 items-center">
                    {{--                        <div class="hidden md:block">--}}
                    {{--                            <x-button icon="folder-add" primary label="Новая папка" wire:click="new_folder"/>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="hidden md:block">--}}
                    {{--                            <x-button icon="document-add" positive label="Новая пин" wire:click="new_pin"/>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="block md:hidden">--}}
                    {{--                            <x-button lg icon="folder-add" primary wire:click="new_folder"/>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="block md:hidden">--}}
                    {{--                            <x-button lg icon="document-add" positive wire:click="new_pin"/>--}}
                    {{--                        </div>--}}
                </div>
            </div>
{{--            <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">--}}
{{--                <div class="hidden md:block">--}}
{{--                    <x-button icon="plus-circle" primary wire:click="open_add_homework_modal">Новое ДЗ</x-button>--}}
{{--                </div>--}}
{{--                <div class="block md:hidden">--}}
{{--                    <x-button lg icon="plus-circle" primary wire:click="new_folder"/>--}}
{{--                </div>--}}

{{--            </div>--}}
        </div>
    </div>
</header>

<div class="overflow-auto pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">

    <div class="flex-initial mb-2 w-full xl:w-1/3 xl:pr-3 self-auto ">
        <div
            class="shadow-lg rounded-2xl p-4 bg-white dark:text-gray-50 dark:bg-gray-700 text-xl w-full h-full flex inline-flex font-bold">
            <div class="w-3/4 inline-flex">Пользователи</div>
            <div class="w-1/4 text-center"><span class="">{{  number_format($users_all_counter, 0, '', ' ') }}</span>
            </div>
        </div>
    </div>

    <div class="flex-initial mb-2 w-full xl:w-1/3 xl:pr-3 self-auto ">
        <div
            class="shadow-lg rounded-2xl p-4 bg-white dark:text-gray-50 dark:bg-gray-700 text-xl w-full h-full flex inline-flex font-bold">
            <div class="w-3/4 inline-flex">Пользователи (reg)</div>
            <div class="w-1/4 text-center"><span class="">{{  number_format($reg_user_counter, 0, '', ' ') }}</span>
            </div>
        </div>
    </div>
    <div class="flex-initial mb-2 w-full xl:w-1/3 xl:pr-3 self-auto ">
        <div
            class="shadow-lg rounded-2xl p-4 bg-white dark:text-gray-50 dark:bg-gray-700 text-xl w-full h-full flex inline-flex font-bold">
            <div class="w-3/4 inline-flex">Группы</div>
            <div class="w-1/4 text-center"><span class="">{{  number_format($groups_counter, 0, '', ' ') }}</span></div>
        </div>
    </div>
    <div class="flex-initial mb-2 w-full xl:w-1/3 xl:pr-3 self-auto ">
        <div
            class="shadow-lg rounded-2xl p-4 bg-white dark:text-gray-50 dark:bg-gray-700 text-xl w-full h-full flex inline-flex font-bold">
            <div class="w-3/4 inline-flex">Домашние задания</div>
            <div class="w-1/4 text-center"><span class="">{{  number_format($homeworks_counter, 0, '', ' ') }}</span>
            </div>
        </div>
    </div>
    <div class="flex-initial mb-2 w-full xl:w-1/3 xl:pr-3 self-auto ">
        <div
            class="shadow-lg rounded-2xl p-4 bg-white dark:text-gray-50 dark:bg-gray-700 text-xl w-full h-full flex inline-flex font-bold">
            <div class="w-3/4 inline-flex">Сканирования</div>
            <div class="w-1/4 text-center"><span class="">{{  number_format($scan_counter, 0, '', ' ') }}</span></div>
        </div>
    </div>

    <div class="flex-initial mb-2 w-full xl:w-1/3 xl:pr-3 self-auto ">
        <div
            class="shadow-lg rounded-2xl p-4 bg-white dark:text-gray-50 dark:bg-gray-700 text-xl w-full h-full flex inline-flex font-bold">
            <div class="w-3/4 inline-flex">Публичные группы</div>
            <div class="w-1/4 text-center"><span class="">{{  number_format($public_slugs_counter, 0, '', ' ') }}</span>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="overflow-auto pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData1->reactiveKey() }}"
                        :pie-chart-model="$ChartData1"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData2->reactiveKey() }}"
                        :pie-chart-model="$ChartData2"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData3->reactiveKey() }}"
                        :pie-chart-model="$ChartData3"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData4->reactiveKey() }}"
                        :pie-chart-model="$ChartData4"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData5->reactiveKey() }}"
                        :pie-chart-model="$ChartData5"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData6->reactiveKey() }}"
                        :pie-chart-model="$ChartData6"
                    />
                </div>
            </div>
        </div>
    </div>

</div>
