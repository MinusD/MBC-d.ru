<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Домашнее задания
    </span>
</x-slot>

<div>
    @if(is_null($group_id))
        <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40 mb-2">
            <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
                <div
                    class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0 text-center justify-center">
                    <span class="text-base md:text-2xl text-gray-800 dark:text-gray-50">
                    Дождитесь пока ваc примут в группу
                    </span>
                </div>
            </div>
        </header>
    @else
        <x-modal.card title="Добавление домашнего задания" blur wire:model.defer="add_homework_modal_is_open">
            <div class="grid grid-cols-1 gap-3">

                <div class="">
                    <label
                        class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1">
                        Предмет
                    </label>
                    <select
                        class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500
                        border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 block w-full
                        sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm cursor-pointer overflow-hidden
                        dark:text-secondary-400 mb-2"
                        wire:model.defer="selected_subject"
                    >
                        @forelse($subjects as $key => $subject)
                            <option
                                label="{{ $subject->title }}"
                                value="{{ $key }}"/>
                        @empty
                            <option label="Не существует" value=-1/>
                        @endforelse
                    </select>
                </div>
                <x-textarea label="Текст задания" wire:model="homework_text">

                </x-textarea>
                <label
                    class="block text-sm font-medium text-secondary-700 dark:text-gray-400">
                    Дата домашнего задания
                </label>
                <input type="date"
                       class="rounded-md border border-secondary-300 dark:border-secondary-600 bg-gray-100 dark:bg-secondary-800"
                       wire:model="homework_to_date">
                <x-errors wire:model="homework_to_date"/>
            </div>
            <x-slot name="footer">

                <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                    <div class="flex">
                        {{--                    <x-button primary class="mr-2" icon="refresh" wire:click="reload_subjects" label=""/>--}}
                    </div>
                    <div class="flex">
                        <x-button flat label="Отменить" x-on:click="close"/>
                        <x-button primary label="Предложить" wire:click="save_homework"/>
                    </div>
                </div>
            </x-slot>
        </x-modal.card>

        <x-modal.card title="Просмотр домашнего задания" blur wire:model.defer="show_homework_modal_is_open">
            <div class="grid grid-cols-1 gap-3">
                <label
                    class="block text-sm font-medium text-secondary-700 dark:text-gray-400 ">
                    Предмет
                    <h1 class="text-xl font-semibold">{{ $show_homework_subject  }}</h1>
                </label>

                <label
                    class="block text-sm font-medium text-secondary-700 dark:text-gray-400 ">
                    Текст задания
                    <p class=" -mt-4 text-gray-800 dark:text-gray-300 whitespace-pre-line">
                        {{ $show_homework->text ?? "" }}
                    </p>
                </label>
                <label
                    class="block text-sm font-medium text-secondary-700 dark:text-gray-400">
                    Дата домашнего задания
                </label>
                <div class="w-full">
                    <div
                        class="text-lg px-3 mb-2 -mt-3 inline-flex rounded-md text-gray-800 bg-gray-100 dark:text-gray-200 dark:bg-gray-600">
                        {{ mb_substr($show_homework->to_date  ?? '', 0, -8)}}</div>
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                    <div class="flex">
                        {{--                    <x-button primary class="mr-2" icon="refresh" wire:click="reload_subjects" label=""/>--}}
                    </div>
                    <div class="flex">
                        {{--                    <x-button flat label="Отменить" x-on:click="close"/>--}}
                        <x-button primary label="Завершить" x-on:click="close"/>
                    </div>
                </div>
            </x-slot>
        </x-modal.card>

        <x-modal.card title="Фильтр предметов" blur wire:model.defer="mobile_modal_select_subject">
            <div class="grid grid-cols-1 gap-3">

                <div class="">
                    <label
                        class="block text-sm font-medium text-secondary-700 dark:text-gray-400 mb-1">
                        Предмет
                    </label>
                    <select
                        class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500
                        border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 block w-full
                        sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm cursor-pointer overflow-hidden
                        dark:text-secondary-400 mb-2"
                        wire:model.defer="filter_subject"
                    >
                        <option
                            label="Все предметы"
                            value="-1"/>
                        @forelse($subjects as $key => $subject)
                            <option
                                label="{{ $subject->title }}"
                                value="{{ $key }}"/>
                        @empty
                            <option label="Не существует" value=-2/>
                        @endforelse
                    </select>
                </div>

            </div>
            <x-slot name="footer">
                <div class="flex justify-between gap-x-1">
                    <div class="flex">
                        <x-button primary class="mr-2" icon="refresh" wire:click="reset_subject" label=""/>
                    </div>
                    <div class="flex">
                        <x-button flat label="Отменить" x-on:click="close"/>
                        <x-button primary label="Применить" wire:click="select_filter_subject"/>
                    </div>
                </div>
            </x-slot>
        </x-modal.card>

        <header
            class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-14 md:h-16 rounded-md md:rounded-2xl z-40 mb-2">
            <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
                <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                    <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">

                        <div class="relative flex items-center w-full lg:w-64 h-full group">
                            <div
                                class="absolute z-50 flex items-center justify-center block w-auto h-10 p-3 pr-2 text-sm text-gray-500 uppercase cursor-pointer sm:hidden">
                                <svg fill="none" class="relative w-5 h-5" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <svg
                                class="absolute left-0 z-20 hidden w-4 h-4 ml-4 text-gray-500 pointer-events-none fill-current group-hover:text-gray-400 sm:block"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                                </path>
                            </svg>
                            <input type="text"
                                   wire:model="search"
                                   class="block w-full py-1.5 pl-10 pr-4 leading-normal rounded-2xl focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 ring-opacity-90 bg-gray-100 dark:bg-gray-800 text-gray-400 aa-input"
                                   placeholder="Поиск">

                        </div>

                        <div class="grid grid-cols-2 gap-4 items-center ml-3">
                            @if($all)
                                <div class="hidden md:block w-full">
                                    <x-button icon="database" positive wire:click="show_unc" class="w-full"
                                              label="Отображать невыполненные"/>
                                </div>
                                <div class="block md:hidden">
                                    <x-button lg icon="database" positive wire:click="show_unc"/>
                                </div>
                            @else
                                <div class="hidden md:block">
                                    <x-button icon="shield-check" primary wire:click="show_all" class="w-full"
                                              label="Отображать все"/>
                                </div>
                                <div class="block md:hidden">
                                    <x-button lg icon="shield-check" primary wire:click="show_all"/>
                                </div>
                            @endif
                            <div class="block md:hidden ml-2">
                                <x-button lg icon="selector" primary wire:click="open_subjects_modal"/>
                            </div>
                            <div class="hidden md:block">
                                <select
                                    wire:change="select_filter_subject"
                                    class="placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500
                            border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 block w-full
                            sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm cursor-pointer overflow-hidden
                            dark:text-secondary-400"
                                    wire:model.defer="filter_subject"
                                >
                                    <option
                                        label="Все предметы"
                                        value="-1"/>
                                    @forelse($subjects as $key => $subject)
                                        <option
                                            label="{{ $subject->title }}"
                                            value="{{ $key }}"/>
                                    @empty
                                        <option label="Не существует" value=-2/>
                                    @endforelse
                                </select>
                            </div>
                            {{--                                                <div class="hidden md:block">--}}
                            {{--                                                    <x-button icon="document-add" positive label="Новая пин" wire:click="new_pin"/>--}}
                            {{--                                                </div>--}}
                            {{--                                                <div class="block md:hidden">--}}
                            {{--                                                    <x-button lg icon="folder-add" primary wire:click="new_folder"/>--}}
                            {{--                                                </div>--}}
                            {{--                                                <div class="block md:hidden">--}}
                            {{--                                                    <x-button lg icon="document-add" positive wire:click="new_pin"/>--}}
                            {{--                                                </div>--}}
                        </div>
                    </div>
                    <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                        <div class="hidden md:block">
                            <x-button icon="plus-circle" primary wire:click="open_add_homework_modal">Предложить ДЗ
                            </x-button>
                        </div>
                        <div class="block md:hidden">
                            <x-button lg icon="plus-circle" primary wire:click="open_add_homework_modal"/>
                        </div>

                    </div>
                </div>
            </div>
        </header>


        <div class="relative flex flex-col pr-0">
            <div class="grid mt-1 md:mt-3 gap-2 md:gap-3 grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3">
                @forelse($homeworks as $key => $homework)
                    @if($all or !$homework->done)
                        <div class="flex flex-col">
                            <div class="bg-white dark:bg-gray-700 shadow-md  rounded-3xl p-4">
                                <div class="flex-none lg:flex">
                                    <div class="flex-auto ml-3 justify-evenly py-2">
                                        <div class="flex flex-wrap mb-1">
                                            <div
                                                class="w-full flex-none text-sm text-gray-500 font-medium dark:text-gray-400">
                                                Добавлено: {{ $homework->created_at }}
                                            </div>
                                            <h2 class="flex-auto text-xl font-medium text-gray-800 dark:text-gray-100">
                                                {{  $homework->subject }}</h2>
                                        </div>
                                        <p class="text-lg px-3 mb-2 inline-flex rounded-xl text-gray-800 bg-gray-100 dark:text-gray-200 dark:bg-gray-600">
                                            Задание на: {{  date("d.m.Y", strtotime($homework->to_date))}}
                                        </p>
                                        <div
                                            class="flex-auto py-2 mb-3 pt-1 px-3 text-sm text-gray-500 rounded-xl bg-gray-100 dark:bg-gray-600">
                                            <div class="flex-1 inline-flex items-center">
                                                <div>
                                                    <p class="text-gray-800 dark:text-gray-300 whitespace-pre-line">@if(mb_strlen($homework->text) < 110) {{ $homework->text }}
                                                        @else {{ mb_substr($homework->text, 0, 109) . "..." }} @endif</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex space-x-4 text-sm font-medium">
                                            @if($homework->done)
                                                <div class="flex-auto flex">
                                                    <button
                                                        wire:click="uncompete_homework({{$key}})"
                                                        class="md:mb-0 px-2 py-1 shadow-sm tracking-wider border border-2 text-gray-800 rounded-full border-green-400 dark:border-green-400 inline-flex items-center space-x-2 dark:text-gray-200 group group-hover:border-green-500 transition duration-300">
                                                    <span
                                                        class="border border-4 border-green-500 rounded-full h-4 w-4 dark:border-green-500 group-hover:border-red-500 transition duration-300">
                                                    </span>
                                                        <span
                                                            class="font-semibold text-green-500 group-hover:text-red-500 transition duration-300">Выполнил</span>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="flex-auto flex">
                                                    <button
                                                        wire:click="compete_homework({{$key}})"
                                                        class="md:mb-0 px-2 py-1 shadow-sm tracking-wider border border-2 text-gray-800 rounded-full
                                                                                    border-gray-300 dark:border-gray-400
                                                                                    inline-flex items-center space-x-2 dark:text-gray-200 group group-hover:border-green-500 transition duration-300">
                                                                                <span
                                                                                    class="border border-4 border-gray-700 rounded-full h-4 w-4 dark:border-gray-400 group-hover:border-green-500 transition duration-300">
                                                                                </span>
                                                        <span
                                                            class="font-semibold group-hover:text-green-500 transition duration-300">Не выполнил</span>
                                                    </button>
                                                </div>
                                            @endif

                                            <x-button rightIcon="information-circle" info
                                                      wire:click="open_homework({{ $key }})"
                                                      wire:loading.attr="enabled"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty

                @endforelse
            </div>
        </div>
    @endif
</div>
