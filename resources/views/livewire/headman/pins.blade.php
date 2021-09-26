<x-slot name="header">
        <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100 ">Закрепы группы
        </span>
</x-slot>

<div>

    {{--    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full flex items-center justify-center h-64">--}}
    {{--        <x-button xl primary wire:click="activate">Активировать закрепы</x-button>--}}
    {{--        <span class=""></span>--}}
    {{--        <div class="h-20 flex">21</div>--}}

    {{--    </div>--}}
    <x-modal.card title="Данные для FastShare" blur wire:model.defer="info_modal">
        @if(isset($data->fs_code))
            <div class="grid grid-cols-1 gap-4">
                <div class="text-md ">Код досутпа: <code class="font-bold text-4xl"> {{ $data->fs_code }}</code></div>
                <div class="text-md ">Пин код: <code class="font-bold text-4xl"> {{ $data->fs_pass }}</code></div>
                <div class="">
                    <div class="flex justify-between mb-1">
                        <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">
                            Новый пин код <span class="text-xs text-gray-500 ">(Строго 5 символов)</span>
                        </label>
                    </div>
                    <div class="relative rounded-md shadow-sm">
                        <x-inputs.maskable mask="#####" wire:model.defer="new_pincode"/>
                        @if($pin_error)
                            <div class="text-red-600 text-sm">Неверный формат пин кода</div>
                        @endif
                    </div>
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                    <div class="flex">
                        <x-button flat negative class="mr-2" @click="confirm = !confirm" label="Деактивировать FS"/>
                        <x-button negative
                                  x-show="confirm"
                                  class="transition"
                                  label="Я уверен"
                                  wire:click="deactivate_fs"
                                  x-transition:enter="transition ease-out duration-200"
                                  x-transition:enter-start="transform opacity-0 scale-95"
                                  x-transition:enter-end="transform opacity-100 scale-100"/>
                    </div>
                    <div class="flex">
                        <x-button flat label="Отменить" x-on:click="close"/>
                        <x-button primary label="Сохранить" wire:click="save_new_pincode"/>
                    </div>
                </div>
            </x-slot>
        @else
            <div
                class="shadow-lg rounded-2xl p-4 bg-gray-200 dark:bg-gray-800 w-full flex items-center justify-center h-64">
                <x-button md primary wire:click="activate_fs">Активировать FastShare</x-button>
            </div>
        @endif
    </x-modal.card>


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


</div>
