<x-slot name="header">
        <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100 ">Закрепы группы
        </span>
</x-slot>

<div>

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


    <x-modal.card title="Новая папка" blur wire:model.defer="new_folder_modal">
        <div class="grid grid-cols-1 gap-4">

            <x-input label="Название" wire:model="new_folder_name"></x-input>
            <x-input label="Описание" wire:model="new_folder_desc"></x-input>
{{--            <div>--}}
{{--                <div class="flex justify-between mb-1">--}}
{{--                    <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">--}}
{{--                        Название папки<span class="text-xs text-gray-500"></span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="relative rounded-md shadow-sm">--}}
{{--                    <x-input wire:model.defer="new_pincode"/>--}}
{{--                    @if($pin_error)--}}
{{--                        <div class="text-red-600 text-sm">Неверный формат пин кода</div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                <div class="flex">
{{--                    <x-button flat negative class="mr-2" @click="confirm = !confirm" label="Деактивировать FS"/>--}}
{{--                    <x-button negative--}}
{{--                              x-show="confirm"--}}
{{--                              class="transition"--}}
{{--                              label="Я уверен"--}}
{{--                              wire:click="deactivate_fs"--}}
{{--                              x-transition:enter="transition ease-out duration-200"--}}
{{--                              x-transition:enter-start="transform opacity-0 scale-95"--}}
{{--                              x-transition:enter-end="transform opacity-100 scale-100"/>--}}
                </div>
                <div class="flex">
                    <x-button flat label="Отменить" x-on:click="close"/>
                    <x-button primary label="Создать" wire:click="new_folder_confirm"/>
                </div>
            </div>
        </x-slot>

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
    @if(isset($folders_lines[0]))
    <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-10 rounded-xl z-40 mb-2">
        <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
            <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                <ul class="flex text-gray-400 text-sm lg:text-base">
                    <li class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" wire:click="go_folder(0)" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <svg
                            class="h-5 w-auto text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </li>
                    @forelse($folders_lines as $f)
                    <li class="inline-flex items-center cursor-pointer" wire:click="go_folder({{ $f['id'] }})">
                        <span class="">{{ $f['name'] }}</span>
                        <svg
                            class="h-5 w-auto text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </li>
                        @empty
                    @endforelse
{{--                    <li class="inline-flex items-center">--}}
{{--                        <a href="#" class="text-teal-400">Breadcrumb</a>--}}
{{--                    </li>--}}
                </ul>

            </div>
        </div>
    </header>
    @endif
    <div class="w-full flex flex-wrap mb-2">
        @forelse($folders as $folder)
            <div class="flex-auto w-full md:w-1/2 lg:w-1/4 px-3 py-2 ">
                <div

                    class="flex items-center bg-indigo-500 rounded-md p-3 text-white cursor-pointer transition duration-500 ease-in-out hover:shadow hover:bg-indigo-600"
                    x-data="{ open: false, color: false }" @keydown.escape="open = false" @click.away="open = false">

                    <div class="flex items-center transition duration-500 ease-in-out w-full" wire:click="go_folder({{$folder->id}})">
                        <div>
                            <svg fill="currentColor" class="w-10 h-10" style="" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M0 4c0-1.1.9-2 2-2h7l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"></path>
                            </svg>
                        </div>
                        <div class="px-3 mr-auto">
                            <h4 class="font-bold">{{ $folder->name }}</h4>
                            <small class="text-xs">{{ $folder->desc }}</small>
                        </div>
                    </div>
                    <div class="relative">
                        <a href="javascript:;" @click="open = !open" >
                            <svg fill="currentColor" class="w-5 h-5" style="" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M10 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path>
                            </svg>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="options absolute bg-white text-gray-600 origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg overflow-hidden">
                            <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100 ">
                                <span class="mr-auto">Редактировать</span>
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>

                            </a>
                            <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100">
                                <span class="mr-auto">Скачать</span>
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">
                                    <path fill-rule="evenodd"
                                          d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>

                            </a>
                            <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100"
                               @click="color = !color">
                                <span class="mr-auto">Изменить цвет</span>
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">
                                    <path fill-rule="evenodd"
                                          d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                                          clip-rule="evenodd"></path>
                                </svg>

                            </a>
                            <div x-show="color" class="flex flex-wrap p-2" style="display: none;">
                                <div class="w-1/5 h-8 hover:bg-gray-700 bg-gray-500"></div>
                                <div class="w-1/5 h-8 hover:bg-blue-700 bg-blue-500"></div>
                                <div class="w-1/5 h-8 hover:bg-red-700 bg-red-500"></div>
                                <div class="w-1/5 h-8 hover:bg-orange-700 bg-orange-500"></div>
                                <div class="w-1/5 h-8 hover:bg-yellow-700 bg-yellow-500"></div>
                                <div class="w-1/5 h-8 hover:bg-green-700 bg-green-500"></div>
                                <div class="w-1/5 h-8 hover:bg-teal-700 bg-teal-500"></div>
                                <div class="w-1/5 h-8 hover:bg-indigo-700 bg-indigo-500"></div>
                                <div class="w-1/5 h-8 hover:bg-purple-700 bg-purple-500"></div>
                                <div class="w-1/5 h-8 hover:bg-pink-700 bg-pink-500"></div>
                            </div>
                            <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold bg-red-400 text-white">
                                <span class="mr-auto">Удалить</span>
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">
                                    <path fill-rule="evenodd"
                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                          clip-rule="evenodd"></path>
                                </svg>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

        {{--        <div class="flex-auto w-full md:w-1/2 lg:w-1/4 px-3 py-2">--}}
        {{--            <div--}}
        {{--                class="flex items-center bg-indigo-500 rounded-md p-3 text-white cursor-pointer transition duration-500 ease-in-out hover:shadow hover:bg-indigo-600"--}}
        {{--                x-data="{ open: false, color: false }" @keydown.escape="open = false" @click.away="open = false">--}}
        {{--                <div>--}}
        {{--                    <svg fill="currentColor" class="w-10 h-10" style="" xmlns="http://www.w3.org/2000/svg"--}}
        {{--                         viewBox="0 0 20 20">--}}
        {{--                        <path d="M0 4c0-1.1.9-2 2-2h7l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"></path>--}}
        {{--                    </svg>--}}

        {{--                </div>--}}
        {{--                <div class="px-3 mr-auto">--}}
        {{--                    <h4 class="font-bold"></h4>--}}
        {{--                    <small class="text-xs"> </small>--}}
        {{--                </div>--}}
        {{--                <div class="relative">--}}
        {{--                    <a @click="open = !open">--}}
        {{--                        <svg fill="currentColor" class="w-5 h-5" style="" xmlns="http://www.w3.org/2000/svg"--}}
        {{--                             viewBox="0 0 20 20">--}}
        {{--                            <path--}}
        {{--                                d="M10 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path>--}}
        {{--                        </svg>--}}
        {{--                    </a>--}}

        {{--                    <div x-show="open" x-transition:enter="transition ease-out duration-100"--}}
        {{--                         x-transition:enter-start="transform opacity-0 scale-95"--}}
        {{--                         x-transition:enter-end="transform opacity-100 scale-100"--}}
        {{--                         x-transition:leave="transition ease-in duration-75"--}}
        {{--                         x-transition:leave-start="transform opacity-100 scale-100"--}}
        {{--                         x-transition:leave-end="transform opacity-0 scale-95"--}}
        {{--                         class="options absolute bg-white text-gray-600 origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg overflow-hidden">--}}
        {{--                        <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100 ">--}}
        {{--                            <span class="mr-auto">Редактировать</span>--}}
        {{--                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">--}}
        {{--                                <path--}}
        {{--                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>--}}
        {{--                            </svg>--}}

        {{--                        </a>--}}
        {{--                        <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100">--}}
        {{--                            <span class="mr-auto">Скачать</span>--}}
        {{--                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">--}}
        {{--                                <path fill-rule="evenodd"--}}
        {{--                                      d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"--}}
        {{--                                      clip-rule="evenodd"></path>--}}
        {{--                            </svg>--}}

        {{--                        </a>--}}
        {{--                        <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100"--}}
        {{--                           @click="color = !color">--}}
        {{--                            <span class="mr-auto">Изменить цвет</span>--}}
        {{--                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">--}}
        {{--                                <path fill-rule="evenodd"--}}
        {{--                                      d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"--}}
        {{--                                      clip-rule="evenodd"></path>--}}
        {{--                            </svg>--}}

        {{--                        </a>--}}
        {{--                        <div x-show="color" class="flex flex-wrap p-2" style="display: none;">--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-gray-700 bg-gray-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-blue-700 bg-blue-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-red-700 bg-red-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-orange-700 bg-orange-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-yellow-700 bg-yellow-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-green-700 bg-green-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-teal-700 bg-teal-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-indigo-700 bg-indigo-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-purple-700 bg-purple-500"></div>--}}
        {{--                            <div class="w-1/5 h-8 hover:bg-pink-700 bg-pink-500"></div>--}}
        {{--                        </div>--}}
        {{--                        <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold bg-red-400 text-white">--}}
        {{--                            <span class="mr-auto">Удалить</span>--}}
        {{--                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">--}}
        {{--                                <path fill-rule="evenodd"--}}
        {{--                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"--}}
        {{--                                      clip-rule="evenodd"></path>--}}
        {{--                            </svg>--}}

        {{--                        </a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>


    {{--    <div class="">--}}
    {{--        <div class="mx-auto w-full md:w-1/2 lg:w-1/4 px-3 pb-3" >--}}
    {{--            <div class="flex items-center bg-indigo-500 rounded-md p-3 text-white cursor-pointer transition duration-500 ease-in-out hover:shadow hover:bg-indigo-600" x-data="{ open: false, color: false }" @keydown.escape="open = false" @click.away="open = false">--}}
    {{--                <div>--}}
    {{--                    <svg fill="currentColor" class="w-10 h-10" style="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 4c0-1.1.9-2 2-2h7l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"></path></svg>--}}

    {{--                </div>--}}
    {{--                <div class="px-3 mr-auto">--}}
    {{--                    <h4 class="font-bold">item 1</h4>--}}
    {{--                    <small class="text-xs">Lorem ipsum dolor sit amet,...</small>--}}
    {{--                </div>--}}
    {{--                <div class="relative">--}}
    {{--                    <a href="javascript:;" @click="open = !open">--}}
    {{--                        <svg fill="currentColor" class="w-5 h-5" style="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path></svg>--}}

    {{--                    </a>--}}

    {{--                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="options absolute bg-white text-gray-600 origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg overflow-hidden">--}}
    {{--                        <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100 ">--}}
    {{--                            <span class="mr-auto">Edit</span>--}}
    {{--                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">--}}
    {{--                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>--}}
    {{--                            </svg>--}}

    {{--                        </a>--}}
    {{--                        <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100">--}}
    {{--                            <span class="mr-auto">Download</span>--}}
    {{--                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">--}}
    {{--                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>--}}
    {{--                            </svg>--}}

    {{--                        </a>--}}
    {{--                        <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold hover:bg-gray-100" @click="color = !color">--}}
    {{--                            <span class="mr-auto">Change Color</span>--}}
    {{--                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">--}}
    {{--                                <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd"></path>--}}
    {{--                            </svg>--}}

    {{--                        </a>--}}
    {{--                        <div x-show="color" class="flex flex-wrap p-2" style="display: none;">--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-gray-700 bg-gray-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-blue-700 bg-blue-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-red-700 bg-red-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-orange-700 bg-orange-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-yellow-700 bg-yellow-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-green-700 bg-green-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-teal-700 bg-teal-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-indigo-700 bg-indigo-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-purple-700 bg-purple-500"></div>--}}
    {{--                            <div class="w-1/5 h-8 hover:bg-pink-700 bg-pink-500"></div>--}}
    {{--                        </div>--}}
    {{--                        <a href="javascript:;" class="flex py-3 px-2 text-sm font-bold bg-red-400 text-white">--}}
    {{--                            <span class="mr-auto">Delete</span>--}}
    {{--                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="">--}}
    {{--                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>--}}
    {{--                            </svg>--}}

    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

</div>
