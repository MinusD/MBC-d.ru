<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Сервисы
    </span>
</x-slot>

<div>

    <x-modal.card title="Настройки токена расширения" blur wire:model.defer="modal_token_menu">
        @if(mb_strlen($token) > 5)
            <div class="grid grid-cols-1 gap-4" x-data="{show_link: false}">
                <div class="text-md ">Токен <span x-show="!show_link">скрыт</span>
                </div>
                {{--                <div x-show="!show_link" x-transition:enter="transition ease-out duration-200"--}}
                {{--                     x-transition:enter-start="transform opacity-0 scale-95"--}}
                {{--                     x-transition:enter-end="transform opacity-100 scale-100" class="text-md select-all">--}}
                {{--                    <code>****************************************</code></div>--}}
                <div x-show="show_link" x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100" class="text-md select-all">
                    <code>{{ $token }}</code></div>
                <x-button positive class="mr-2" @click="show_link = !show_link" label="Показать полностью/скрыть"/>
                <x-button primary class="mr-2" wire:click="regenerate_token"
                          label="Сгенерировать новый токен"/>
                <x-button warning class="mr-2" wire:click="deactivate_token" label="Деактивироовать токен"/>
                {{--                <div class="text-md ">Код досутпа: <code class="font-bold text-4xl"> {{ $data->fs_code }}</code></div>--}}
                {{--                <div class="text-md ">Пин код: <code class="font-bold text-4xl"> {{ $data->fs_pass }}</code></div>--}}
                {{--                <div class="">--}}
                {{--                    <div class="flex justify-between mb-1">--}}
                {{--                        <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">--}}
                {{--                            Новый пин код <span class="text-xs text-gray-500 ">(Строго 5 символов)</span>--}}
                {{--                        </label>--}}
                {{--                    </div>--}}
                {{--                    <div class="relative rounded-md shadow-sm">--}}
                {{--                        <x-inputs.maskable mask="#####" wire:keydown.enter="save_new_pincode" wire:model.defer="new_pincode"/>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <x-slot name="footer">
                <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                    <div class="flex">
                        {{--                        <x-button flat negative class="mr-2" @click="confirm = !confirm" label="Деактивировать FS"/>--}}
                        {{--                        <x-button negative--}}
                        {{--                                  x-show="confirm"--}}
                        {{--                                  class="transition"--}}
                        {{--                                  label="Я уверен"--}}
                        {{--                                  wire:click="deactivate_fs"--}}
                        {{--                                  x-transition:enter="transition ease-out duration-200"--}}
                        {{--                                  x-transition:enter-start="transform opacity-0 scale-95"--}}
                        {{--                                  x-transition:enter-end="transform opacity-100 scale-100"/>--}}
                    </div>
                    <div class="flex">
                        <x-button flat label="Отменить" x-on:click="close"/>
                        {{--                        <x-button primary label="Сохранить" wire:click="save_new_pincode"/>--}}
                    </div>
                </div>
            </x-slot>
        @else
            <div
                class="relative shadow-lg rounded-2xl p-4 bg-gray-200 dark:bg-gray-800 w-full flex items-center justify-center h-64">
                <x-button md primary wire:click="generate_token">Сгенерировать токен</x-button>
                <div class="absolute text-xs text-gray-200 bottom-1 right-2">Если кнопка не реагирует, перезагрузите
                    страницу
                </div>
            </div>
        @endif
    </x-modal.card>
    <x-modal.card title="Быстрое добавление студентов" blur wire:model.defer="modal_fast_student">
        <div class="grid grid-cols-1 -mt-3">
            <div class="mb-2">Введите список группы в формате: <br><code class="font-semibold">Фамилия Имя
                    Отчество</code><br> <span class="text-sm">Если Отчество отсутствует, после имени, через пробел, необходимо написать точку.</span>
            </div>
            <x-textarea  wire:model="fast_student_primary_data"></x-textarea>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                <div class="flex">
                </div>
                <div class="flex">
                    <x-button flat label="Отменить" x-on:click="close"/>
                    <x-button positive label="Продолжить" wire:click="fast_student_next"/>
                </div>
            </div>
        </x-slot>

    </x-modal.card>
    <x-modal.card title="Список добавляемых студентов" blur wire:model.defer="modal_fast_student_next">
        <div class="grid grid-cols-1 -mt-3">
            <table class="min-w-max w-full table-auto  border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-600">
                <thead class="">
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal rounded-t-full ">
                    <th class="table-cell md:hidden py-3 px-6 text-left rounded-tl-md ">ФИО</th>
                    <th class="hidden md:table-cell py-3 px-6 text-left rounded-tl-md">Фамилия</th>
                    <th class="hidden md:table-cell py-3 px-6 text-left">Имя</th>
                    <th class="hidden md:table-cell py-3 px-6 text-center">Отчество</th>
                    {{--                        <th class="py-3 px-6 text-center">Status</th>--}}
                    <th class="py-3 px-6 text-center rounded-tr-md"></th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light dark:text-gray-300">
                @forelse($fast_student_data as $key => $student)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-500 dark:hover:bg-gray-800 {{ $key%2 ? 'bg-gray-50 dark:bg-gray-800' : '' }}">
                        <td class="table-cell md:hidden py-3 px-6 text-left">
                            <div class="flex items-center">
{{--                                    <span--}}
{{--                                        class="font-medium">{{ $student[0] . " " . mb_substr($student[1], 0, 1) . ". " .  mb_substr($student[2], 0, 1) . "."  }} </span>--}}
                            </div>
                        </td>
                        <td class="hidden md:table-cell py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $student[0] }} </span>
                            </div>
                        </td>
                        <td class="hidden md:table-cell py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ $student[1] }}</span>
                            </div>
                        </td>
                        <td class="hidden md:table-cell py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <span>{{ $student[2] }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
{{--                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                                         stroke="currentColor">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                                         stroke="currentColor">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
                                <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                     wire:click="delete_user({{$key}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    None Date
                @endforelse
                </tbody>
            </table>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                <div class="flex">
                </div>
                <div class="flex">
                    <x-button flat label="Отменить" x-on:click="close"/>
                    <x-button positive label="Добавить" wire:click="fast_student_final"/>
                </div>
            </div>
        </x-slot>

    </x-modal.card>


    <div class="overflow-auto pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">
        <div class="flex-initial mb-4 w-full md:w-1/2 md:pl-3 lg:pl-3 xl:w-1/3 xl:pr-3 self-auto cursor-pointer"
             wire:click="open_token_menu">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full h-full text-center">
                <span class="font-bold text-2xl text-black dark:text-white">Токен для расширения</span>
            </div>
        </div>

        <div class="flex-initial mb-4 w-full md:w-1/2 md:pl-3 lg:pl-3 xl:w-1/3  xl:pr-3 self-auto"
             wire:click="open_fast_student_modal">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full h-full text-center cursor-pointer">
                <span class="font-bold text-2xl text-black dark:text-white ">Быстрое добавление студентов</span>
            </div>
        </div>

        <div class="flex-initial mb-4 w-full md:w-1/2 md:pl-3 lg:pl-3 xl:w-1/3  xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full h-full text-center">
                <span class="font-bold text-2xl text-black dark:text-white ml-2">Скоро</span>
            </div>
        </div>


        <div class="flex-initial mb-4 w-full md:w-1/2 md:pl-3 lg:pl-3 xl:w-1/3 2xl:w-1/3 xl:pr-3 self-auto">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full h-full">
                <span class="font-bold text-2xl text-black dark:text-white ml-2">Уведомления</span>

                <div class="mt-3 rounded-md  space-y-3">
                    {{-- Тут начинается блок с действиями --}}
                    {{--                    <div class="flex justify-between items-center py-0.5 border-b-2 border-gray-500 dark:border-white">--}}
                    {{--                        <div class="ml-3">--}}
                    {{--                            <span class="text-black font-semibold sm:text-lg md:text-lg dark:text-gray-200">Сообщить о начале пары: </span>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="w-1/4 items-center text-center flex">--}}
                    {{--                            <div class="opacity-40 w-full h-full">--}}
                    {{--                                <svg class="inline-block w-11/12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="opacity-40 w-full">--}}
                    {{--                                <svg class="inline-block w-11/12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/><path fill="#b0bec5" d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/><path fill="#cfd8dc" d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--Тут заканчивается один из блоков --}}
                    {{--                    <div class="flex justify-between items-center py-0.5 border-b-2 border-gray-500 dark:border-white">--}}
                    {{--                        <div class="ml-3">--}}
                    {{--                            <span class="text-black font-semibold sm:text-lg md:text-lg dark:text-gray-200">Сообщение отсутсвующим: </span>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="w-1/4 items-center text-center flex">--}}
                    {{--                            <div class="mr-1 w-full h-full border-b-2 border-green-500">--}}
                    {{--                                <svg class="inline-block w-11/12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mr-1 w-full h-full border-b-2 border-red-500">--}}
                    {{--                                <svg class="inline-block w-11/12 opacity-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/><path fill="#b0bec5" d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/><path fill="#cfd8dc" d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}


                    <div class="">
                        <div
                            class="flex justify-between items-center rounded-md px-1 py-2 bg-gray-100 dark:bg-gray-600">
                            <div class="ml-3 ">
                                <span
                                    class="text-black font-semibold sm:text-lg md:text-lg 2xl:text-xl dark:text-gray-200">1-й тип уведомлений</span>
                            </div>
                            <div class="w-1/4 items-center text-center flex">
                                <div class="w-full h-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-red-500 opacity-40"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#4caf50"
                                              d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>
                                        <path fill="#ffc107"
                                              d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>
                                        <path fill="#4caf50"
                                              d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>
                                        <path fill="#ffc107"
                                              d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>
                                        <path fill="#f44336"
                                              d="M41.84,15H24v13l-3-1L7.16,13.26H7.14C10.68,7.69,16.91,4,24,4C31.8,4,38.55,8.48,41.84,15z"/>
                                        <path fill="#dd2c00" d="M7.158,13.264l8.843,14.862L21,27L7.158,13.264z"/>
                                        <path fill="#558b2f" d="M23.157,44l8.934-16.059L28,25L23.157,44z"/>
                                        <path fill="#f9a825" d="M41.865,15H24l-1.579,4.58L41.865,15z"/>
                                        <path fill="#fff"
                                              d="M33,24c0,4.969-4.031,9-9,9s-9-4.031-9-9s4.031-9,9-9S33,19.031,33,24z"/>
                                        <path fill="#2196f3"
                                              d="M31,24c0,3.867-3.133,7-7,7s-7-3.133-7-7s3.133-7,7-7S31,20.133,31,24z"/>
                                    </svg>
                                </div>
                                <div class="w-full h-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-red-500 opacity-40"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                        <path fill="#fff"
                                              d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-red-500 opacity-40"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                        <path fill="#fff"
                                              d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/>
                                        <path fill="#b0bec5"
                                              d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/>
                                        <path fill="#cfd8dc"
                                              d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div
                            class="flex justify-between items-center rounded-md px-1 py-2 bg-gray-100 dark:bg-gray-600">
                            <div class="ml-3 ">
                                <span
                                    class="text-black font-semibold sm:text-lg md:text-lg 2xl:text-xl dark:text-gray-200">2-й тип уведомлений</span>
                            </div>
                            <div class="w-1/4 items-center text-center flex">
                                <div class="w-full h-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-green-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#4caf50"
                                              d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>
                                        <path fill="#ffc107"
                                              d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>
                                        <path fill="#4caf50"
                                              d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>
                                        <path fill="#ffc107"
                                              d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>
                                        <path fill="#f44336"
                                              d="M41.84,15H24v13l-3-1L7.16,13.26H7.14C10.68,7.69,16.91,4,24,4C31.8,4,38.55,8.48,41.84,15z"/>
                                        <path fill="#dd2c00" d="M7.158,13.264l8.843,14.862L21,27L7.158,13.264z"/>
                                        <path fill="#558b2f" d="M23.157,44l8.934-16.059L28,25L23.157,44z"/>
                                        <path fill="#f9a825" d="M41.865,15H24l-1.579,4.58L41.865,15z"/>
                                        <path fill="#fff"
                                              d="M33,24c0,4.969-4.031,9-9,9s-9-4.031-9-9s4.031-9,9-9S33,19.031,33,24z"/>
                                        <path fill="#2196f3"
                                              d="M31,24c0,3.867-3.133,7-7,7s-7-3.133-7-7s3.133-7,7-7S31,20.133,31,24z"/>
                                    </svg>
                                </div>
                                <div class="w-full h-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-green-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                        <path fill="#fff"
                                              d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-red-500 opacity-40"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                        <path fill="#fff"
                                              d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/>
                                        <path fill="#b0bec5"
                                              d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/>
                                        <path fill="#cfd8dc"
                                              d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div
                            class="flex justify-between items-center rounded-md px-1 py-2 bg-gray-100 dark:bg-gray-600">
                            <div class="ml-3 ">
                                <span
                                    class="text-black font-semibold sm:text-lg md:text-lg 2xl:text-xl dark:text-gray-200">3-й тип уведомлений</span>
                            </div>
                            <div class="w-1/4 items-center text-center flex">
                                <div class="w-full h-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-green-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#4caf50"
                                              d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>
                                        <path fill="#ffc107"
                                              d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>
                                        <path fill="#4caf50"
                                              d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>
                                        <path fill="#ffc107"
                                              d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>
                                        <path fill="#f44336"
                                              d="M41.84,15H24v13l-3-1L7.16,13.26H7.14C10.68,7.69,16.91,4,24,4C31.8,4,38.55,8.48,41.84,15z"/>
                                        <path fill="#dd2c00" d="M7.158,13.264l8.843,14.862L21,27L7.158,13.264z"/>
                                        <path fill="#558b2f" d="M23.157,44l8.934-16.059L28,25L23.157,44z"/>
                                        <path fill="#f9a825" d="M41.865,15H24l-1.579,4.58L41.865,15z"/>
                                        <path fill="#fff"
                                              d="M33,24c0,4.969-4.031,9-9,9s-9-4.031-9-9s4.031-9,9-9S33,19.031,33,24z"/>
                                        <path fill="#2196f3"
                                              d="M31,24c0,3.867-3.133,7-7,7s-7-3.133-7-7s3.133-7,7-7S31,20.133,31,24z"/>
                                    </svg>
                                </div>
                                <div class="w-full h-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-green-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                        <path fill="#fff"
                                              d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-red-500 opacity-40"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                        <path fill="#fff"
                                              d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/>
                                        <path fill="#b0bec5"
                                              d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/>
                                        <path fill="#cfd8dc"
                                              d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div
                            class="flex justify-between items-center rounded-md px-1 py-2 bg-gray-100 dark:bg-gray-600">
                            <div class="ml-3 ">
                                <span
                                    class="text-black font-semibold sm:text-lg md:text-lg 2xl:text-xl dark:text-gray-200">4-й тип уведомлений</span>
                            </div>
                            <div class="w-1/4 items-center text-center flex">
                                <div class="w-full h-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-green-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#4caf50"
                                              d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>
                                        <path fill="#ffc107"
                                              d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>
                                        <path fill="#4caf50"
                                              d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>
                                        <path fill="#ffc107"
                                              d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>
                                        <path fill="#f44336"
                                              d="M41.84,15H24v13l-3-1L7.16,13.26H7.14C10.68,7.69,16.91,4,24,4C31.8,4,38.55,8.48,41.84,15z"/>
                                        <path fill="#dd2c00" d="M7.158,13.264l8.843,14.862L21,27L7.158,13.264z"/>
                                        <path fill="#558b2f" d="M23.157,44l8.934-16.059L28,25L23.157,44z"/>
                                        <path fill="#f9a825" d="M41.865,15H24l-1.579,4.58L41.865,15z"/>
                                        <path fill="#fff"
                                              d="M33,24c0,4.969-4.031,9-9,9s-9-4.031-9-9s4.031-9,9-9S33,19.031,33,24z"/>
                                        <path fill="#2196f3"
                                              d="M31,24c0,3.867-3.133,7-7,7s-7-3.133-7-7s3.133-7,7-7S31,20.133,31,24z"/>
                                    </svg>
                                </div>
                                <div class="w-full h-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-green-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                        <path fill="#fff"
                                              d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <svg class="inline-block w-11/12 rounded-full bg-red-500 opacity-40"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                        <path fill="#fff"
                                              d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/>
                                        <path fill="#b0bec5"
                                              d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/>
                                        <path fill="#cfd8dc"
                                              d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="flex justify-between items-center py-0.5 border-b-2 border-gray-500 dark:border-white">--}}
                    {{--                        <div class="ml-3">--}}
                    {{--                            <span class="text-black font-semibold sm:text-lg md:text-lg dark:text-gray-200">Отправить сообщение2: </span>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="w-1/4 items-center text-center flex">--}}
                    {{--                            <div class="w-full h-full">--}}
                    {{--                                <svg class="inline-block w-11/12 rounded-full bg-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#4caf50" d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>--}}
                    {{--                                    <path fill="#ffc107" d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>--}}
                    {{--                                    <path fill="#4caf50" d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>--}}
                    {{--                                    <path fill="#ffc107" d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>--}}
                    {{--                                    <path fill="#f44336" d="M41.84,15H24v13l-3-1L7.16,13.26H7.14C10.68,7.69,16.91,4,24,4C31.8,4,38.55,8.48,41.84,15z"/>--}}
                    {{--                                    <path fill="#dd2c00" d="M7.158,13.264l8.843,14.862L21,27L7.158,13.264z"/>--}}
                    {{--                                    <path fill="#558b2f" d="M23.157,44l8.934-16.059L28,25L23.157,44z"/>--}}
                    {{--                                    <path fill="#f9a825" d="M41.865,15H24l-1.579,4.58L41.865,15z"/>--}}
                    {{--                                    <path fill="#fff" d="M33,24c0,4.969-4.031,9-9,9s-9-4.031-9-9s4.031-9,9-9S33,19.031,33,24z"/>--}}
                    {{--                                    <path fill="#2196f3" d="M31,24c0,3.867-3.133,7-7,7s-7-3.133-7-7s3.133-7,7-7S31,20.133,31,24z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="w-full h-full">--}}
                    {{--                                <svg class="rounded-full  inline-block w-11/12 bg-red-500 opacity-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="w-full ">--}}
                    {{--                                <svg class="rounded-full bg-green-400 inline-block w-11/12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/><path fill="#b0bec5" d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/><path fill="#cfd8dc" d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="flex justify-between items-center py-0.5 border-b-2 border-gray-500 dark:border-white">--}}
                    {{--                        <div class="ml-3">--}}
                    {{--                            <span class="text-black font-semibold sm:text-lg md:text-lg dark:text-gray-200">Отправить сообщение3: </span>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="w-1/4 items-center text-center flex">--}}
                    {{--                            <div class="w-full h-full">--}}
                    {{--                                <svg class="inline-block w-11/12 rounded-full bg-red-500 opacity-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#4caf50" d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>--}}
                    {{--                                    <path fill="#ffc107" d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>--}}
                    {{--                                    <path fill="#4caf50" d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"/>--}}
                    {{--                                    <path fill="#ffc107" d="M24,4v20l8,4l-8.843,16c0.317,0,0.526,0,0.843,0c11.053,0,20-8.947,20-20S35.053,4,24,4z"/>--}}
                    {{--                                    <path fill="#f44336" d="M41.84,15H24v13l-3-1L7.16,13.26H7.14C10.68,7.69,16.91,4,24,4C31.8,4,38.55,8.48,41.84,15z"/>--}}
                    {{--                                    <path fill="#dd2c00" d="M7.158,13.264l8.843,14.862L21,27L7.158,13.264z"/>--}}
                    {{--                                    <path fill="#558b2f" d="M23.157,44l8.934-16.059L28,25L23.157,44z"/>--}}
                    {{--                                    <path fill="#f9a825" d="M41.865,15H24l-1.579,4.58L41.865,15z"/>--}}
                    {{--                                    <path fill="#fff" d="M33,24c0,4.969-4.031,9-9,9s-9-4.031-9-9s4.031-9,9-9S33,19.031,33,24z"/>--}}
                    {{--                                    <path fill="#2196f3" d="M31,24c0,3.867-3.133,7-7,7s-7-3.133-7-7s3.133-7,7-7S31,20.133,31,24z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="w-full h-full">--}}
                    {{--                                <svg class="rounded-full  inline-block w-11/12 bg-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="w-full">--}}
                    {{--                                <svg class="rounded-full  inline-block w-11/12 bg-red-500 opacity-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/><path fill="#b0bec5" d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/><path fill="#cfd8dc" d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="flex justify-between items-center py-0.5 border-b-2 border-gray-500 dark:border-white">--}}
                    {{--                        <div class="ml-3">--}}
                    {{--                            <span class="text-black font-semibold sm:text-lg md:text-lg dark:text-gray-200">Отправить сообщение4: </span>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="w-1/4 items-center text-center flex">--}}
                    {{--                            <div class="w-full h-full">--}}
                    {{--                                <svg class="rounded-full inline-block w-11/12 bg-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="w-full">--}}
                    {{--                                <svg class="rounded-full inline-block w-11/12 bg-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">--}}
                    {{--                                    <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>--}}
                    {{--                                    <path fill="#fff" d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/><path fill="#b0bec5" d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/><path fill="#cfd8dc" d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/></svg>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>

            </div>
        </div>
    </div>


</div>
