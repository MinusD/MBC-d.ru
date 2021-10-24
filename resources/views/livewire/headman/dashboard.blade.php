<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Моя группа
    </span>
</x-slot>

<div>
    <x-modal.card title="Добавление студента в группу" blur wire:model.defer="add_student_modal_is_open">
        <div class="my-2">
            <span class="font-bold">Внимание!</span> Если вы до этого не добавляли новых студентов,
            прочтите <a href="#" class="text-blue-500 underline">краткую инструкция</a> или посмотрите <a href="#"
                                                                                                          class="text-blue-500 underline">видео</a>.
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">
                        Фамилия
                    </label>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <x-input wire:model.defer="new_stunent_sname"/>
                </div>
            </div>
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">
                        Имя
                    </label>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <x-input wire:model.defer="new_stunent_name"/>
                </div>
            </div>
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">
                        Отчество <span class="text-xs text-gray-500 ">(При наличии)</span>
                    </label>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <x-input wire:model.defer="new_stunent_pname"/>
                </div>
            </div>


            {{--                <div class="text-md ">Код досутпа: <code class="font-bold text-4xl"> 123</code></div>--}}
            {{--                <div class="text-md ">Пин код: <code class="font-bold text-4xl"> 321</code></div>--}}
            {{--                <div class="">--}}
            {{--                    <div class="flex justify-between mb-1">--}}
            {{--                        <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">--}}
            {{--                            Новый пин код <span class="text-xs text-gray-500 ">(Строго 5 символов)</span>--}}
            {{--                        </label>--}}
            {{--                    </div>--}}
            {{--                    <div class="relative rounded-md shadow-sm">--}}
            {{--                        <x-inputs.maskable mask="#####" wire:keydown.enter="save_new_pincode" wire:model.defer="new_pincode"/>--}}
            {{--                        @if($pin_error)--}}
            {{--                            <div class="text-red-600 text-sm mt-1">Неверный формат пин кода</div>--}}
            {{--                        @endif--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                <div class="flex">
                    <x-button flat primary class="mr-2" @click="confirm = !confirm" label=""/>
                    {{--                    <div x-show="confirm"--}}
                    {{--                         class="transition text-center py-1 select-all"--}}
                    {{--                         x-transition:enter="transition ease-out duration-200"--}}
                    {{--                         x-transition:enter-start="transform opacity-0 scale-95"--}}
                    {{--                         x-transition:enter-end="transform opacity-100 scale-100">--}}

                    {{--                        <span class="text-sm ml-2 text-gray-600 dark:text-gray-300">--}}
                    {{--                            {{ route('landing.reg_by_code') . "?t=123" }}--}}
                    {{--                        </span>--}}
                    {{--                    </div>--}}
                    {{--                    <x-button negative--}}
                    {{--                              x-show="confirm"--}}
                    {{--                              class="transition"--}}
                    {{--                              label="{{ "213123" }}"--}}
                    {{--                              wire:click="deactivate_fs"--}}
                    {{--                              x-transition:enter="transition ease-out duration-200"--}}
                    {{--                              x-transition:enter-start="transform opacity-0 scale-95"--}}
                    {{--                              x-transition:enter-end="transform opacity-100 scale-100"/>--}}
                </div>
                <div class="flex">
                    <x-button flat label="Отменить" x-on:click="close"/>
                    <x-button primary label="Добавить" wire:click="act_add_student"/>
                </div>
            </div>
        </x-slot>
        {{--            <div--}}
        {{--                class="shadow-lg rounded-2xl p-4 bg-gray-200 dark:bg-gray-800 w-full flex items-center justify-center h-64">--}}
        {{--                <x-button md primary wire:click="activate_fs">Активировать FastShare</x-button>--}}
        {{--            </div>--}}
    </x-modal.card>

    <x-modal.card title="Настройки приглашений в группу" blur wire:model.defer="invite_link_edit_model_is_open">
        @if(isset($invite->token) && is_null($invite->deleted_at))
            <div class="grid grid-cols-1 gap-4" x-data="{show_link: false}">
                <div class="text-md ">Ссылка-приглашение: <a target="_blank" class="underline text-blue-400" href="{{ route('landing.reg_by_code') . "?t=" . $invite->token }}">{{ mb_substr($invite->token, 0, 12) . "..." }}</a> </div>
                <div x-show="show_link" x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100" class="text-md select-all"><code>{{ route('landing.reg_by_code') . "?t=" . $invite->token }}</code> </div>
                <x-button positive class="mr-2" @click="show_link = !show_link" label="Показать/скрыть ссылку"/>
                <x-button primary class="mr-2" wire:click="generate_new_invite_link" label="Сгенерировать новую ссылку"/>
                <x-button warning class="mr-2" wire:click="deactivate_invite_link" label="Деактивироовать ссылку"/>
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
                        <x-button primary label="Сохранить" wire:click="save_new_pincode"/>
                    </div>
                </div>
            </x-slot>
        @else
            <div
                class="relative shadow-lg rounded-2xl p-4 bg-gray-200 dark:bg-gray-800 w-full flex items-center justify-center h-64">
                <x-button md primary wire:click="generate_invite">Сгенерировать приглашение</x-button>
                <div class="absolute text-xs text-gray-200 bottom-1 right-2">Если кнопка не реагирует, перезагрузите страницу</div>
            </div>
        @endif
    </x-modal.card>


    <div class="overflow-auto pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">
        <div class="flex-initial mb-4 w-full xl:w-2/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex flex-col">
                            <span class="font-bold text-2xl text-black dark:text-white ml-2">Участники группы</span>
                        </div>
                    </div>
                </div>
                {{--                <div class="p-3 px-4 rounded-lg border-2 border-gray-200 my-1 dark:border-gray-400">--}}
                {{--                    <div class="flex items-center">--}}
                {{--                        <div class="flex-shrink-0 h-10 w-10">--}}
                {{--                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=MinusD&amp;color=7F9CF5&amp;background=EBF4FF" alt="">--}}
                {{--                        </div>--}}

                {{--                        <div class="ml-4">--}}
                {{--                            <div class="text-xl leading-5 font-medium font-semibold text-gray-900 dark:text-gray-200">--}}
                {{--                                MinusD&nbsp;-&nbsp;Димон--}}
                {{--                            </div>--}}
                {{--                            <div class="text-md leading-5 text-gray-500 dark:text-gray-400">lukovnikov50@mail.ru</div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <table class="min-w-max w-full table-auto  border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-600">
                    <thead class="">
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal rounded-t-full ">
                        <th class="py-3 px-6 text-left rounded-tl-md">Фамилия</th>
                        <th class="py-3 px-6 text-left">Имя</th>
                        <th class="py-3 px-6 text-center">Отчество</th>
                        {{--                        <th class="py-3 px-6 text-center">Status</th>--}}
                        <th class="py-3 px-6 text-center rounded-tr-md">Действия</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light dark:text-gray-300">
                    @forelse($students as $key => $student)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-500 dark:hover:bg-gray-800 {{ $key%2 == 0 ? 'bg-gray-50 dark:bg-gray-800' : '' }}">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $student->sname  }} </span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $student->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <span>{{ $student->pname }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
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
                    {{--                    <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-500 dark:hover:bg-gray-800">--}}
                    {{--                        <td class="py-3 px-6 text-left whitespace-nowrap ">--}}
                    {{--                            <div class="flex items-center">--}}
                    {{--                                <span class="font-medium">@{{ Фамилия }}</span>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                        <td class="py-3 px-6 text-left">--}}
                    {{--                            <div class="flex items-center">--}}
                    {{--                                <span>@{{ Имя }}</span>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                        <td class="py-3 px-6 text-center">--}}
                    {{--                            <div class="flex item-center justify-center">--}}
                    {{--                                <span>@{{ Отчество }}</span>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                        <td class="py-3 px-6 text-center">--}}
                    {{--                            <div class="flex item-center justify-center">--}}
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
                    {{--                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">--}}
                    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
                    {{--                                         stroke="currentColor">--}}
                    {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
                    {{--                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>--}}
                    {{--                                    </svg>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                    </tr>--}}
                    {{--                    <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-900 bg-gray-50 dark:bg-gray-800">--}}
                    {{--                        <td class="py-3 px-6 text-left">--}}
                    {{--                            <div class="flex items-center">--}}
                    {{--                                <span class="font-medium">@{{ $student->sname }}</span>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                        <td class="py-3 px-6 text-left">--}}
                    {{--                            <div class="flex items-center">--}}
                    {{--                                <span>@{{ $student->name }}</span>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                        <td class="py-3 px-6 text-center">--}}
                    {{--                            <div class="flex item-center justify-center">--}}
                    {{--                                <span>@{{ $student->pname }}</span>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                        <td class="py-3 px-6 text-center">--}}
                    {{--                            <div class="flex item-center justify-center">--}}
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
                    {{--                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">--}}
                    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
                    {{--                                         stroke="currentColor">--}}
                    {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
                    {{--                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>--}}
                    {{--                                    </svg>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                    </tr>--}}
                    </tbody>
                </table>
                {{--                <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden p-2 mt-2 rounded-lg border-2 border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-400">--}}
                {{--                </table>--}}
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full h-full">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex flex-col">
                            <span class="font-bold text-2xl text-black dark:text-white ml-2">Действия</span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 ">
                    <div class="p-2">
                        <button type="button"

                                class="w-full h-full focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform transition hover:scale-105">
                            Добавить ДЗ
                        </button>
                    </div>
                    <div class="p-2">
                        <button type="button"
                                wire:click="open_add_student_modal"
                                class="w-full h-full focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform transition hover:scale-105">
                            Добавить участника
                        </button>
                    </div>
                    <div class="p-2">
                        <button type="button"
{{--                                x-on:click="$openModal('invite_link_edit_model_is_open')"--}}

                                wire:click="open_invite_link_edit_modal"
                                class="w-full h-full focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform transition hover:scale-105">
                            Приглашения
                        </button>
                    </div>

                    <div class="p-2">
                        <button type="button"
                                class="w-full focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform transition hover:scale-105">
                            Действие 2
                        </button>
                    </div>

                    <div class="p-2">
                        <button type="button"
                                class="w-full focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform transition hover:scale-105">
                            Действие 3
                        </button>
                    </div>

                    <div class="p-2">
                        <button type="button"
                                class="w-full focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform transition hover:scale-105">
                            Действие 4
                        </button>
                    </div>

                </div>

            </div>
        </div>
        {{--        <div class="flex-initial mb-4 w-full xl:w-2/3 xl:pr-3">--}}
        {{--            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">--}}
        {{--                <div class="flex items-center justify-between mb-3">--}}
        {{--                    <div class="flex items-center">--}}

        {{--                        <div class="flex flex-col">--}}
        {{--                            <span class="font-bold text-2xl text-black dark:text-white ml-2">Общая информация</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="p-3 px-4 rounded-lg border-2 border-gray-200 my-1 dark:border-gray-400">--}}
        {{--                    <div class="flex items-center">--}}
        {{--                        <div class="flex-shrink-0 h-10 w-10">--}}
        {{--                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=MinusD&amp;color=7F9CF5&amp;background=EBF4FF" alt="">--}}
        {{--                        </div>--}}

        {{--                        <div class="ml-4">--}}
        {{--                            <div class="text-xl leading-5 font-medium font-semibold text-gray-900 dark:text-gray-200">--}}
        {{--                                MinusD&nbsp;-&nbsp;Димон--}}
        {{--                            </div>--}}
        {{--                            <div class="text-md leading-5 text-gray-500 dark:text-gray-400">lukovnikov50@mail.ru</div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden p-2 mt-2 rounded-lg border-2 border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-400">--}}
        {{--                    <tbody class="flex-1 sm:flex-none w-full">--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Голосовой&nbsp;множитель&nbsp;коинов--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Текстовый&nbsp;множитель&nbsp;коинов--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Голосовой&nbsp;множитель&nbsp;опыта--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Текстовый&nbsp;множитель&nbsp;опыта--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            <span>+</span> <span class="font-bold underline"> 0</span><span class="text-sm">%</span>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            ID&nbsp;Discord--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            313743412626980865--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Зарегистрирован--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            2021-08-31 19:57:26--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}

        {{--                    </tbody>--}}
        {{--                </table>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3">--}}
        {{--            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">--}}
        {{--                <div class="flex items-center justify-between mb-3">--}}
        {{--                    <div class="flex items-center">--}}

        {{--                        <div class="flex flex-col">--}}
        {{--                            <span class="font-bold text-2xl text-black dark:text-white ml-2">Общая информация</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="p-3 px-4 rounded-lg border-2 border-gray-200 my-1 dark:border-gray-400">--}}
        {{--                    <div class="flex items-center">--}}
        {{--                        <div class="flex-shrink-0 h-10 w-10">--}}
        {{--                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=MinusD&amp;color=7F9CF5&amp;background=EBF4FF" alt="">--}}
        {{--                        </div>--}}

        {{--                        <div class="ml-4">--}}
        {{--                            <div class="text-xl leading-5 font-medium font-semibold text-gray-900 dark:text-gray-200">--}}
        {{--                                MinusD&nbsp;-&nbsp;Димон--}}
        {{--                            </div>--}}
        {{--                            <div class="text-md leading-5 text-gray-500 dark:text-gray-400">lukovnikov50@mail.ru</div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden p-2 mt-2 rounded-lg border-2 border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-400">--}}
        {{--                    <tbody class="flex-1 sm:flex-none w-full">--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Голосовой&nbsp;множитель&nbsp;коинов--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Текстовый&nbsp;множитель&nbsp;коинов--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Голосовой&nbsp;множитель&nbsp;опыта--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Текстовый&nbsp;множитель&nbsp;опыта--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            <span>+</span> <span class="font-bold underline"> 0</span><span class="text-sm">%</span>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            ID&nbsp;Discord--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            313743412626980865--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            Зарегистрирован--}}
        {{--                        </td>--}}
        {{--                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                            2021-08-31 19:57:26--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}

        {{--                    </tbody>--}}
        {{--                </table>--}}
        {{--            </div>--}}
        {{--        </div>--}}


        {{--        <div class="w-full xl:w-2/3">--}}
        {{--            <div class="mb-4">--}}
        {{--                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">--}}
        {{--                    <div class="flex items-center justify-between mb-3">--}}
        {{--                        <div class="flex items-center">--}}

        {{--                            <div class="flex flex-col">--}}
        {{--                                <span class="font-bold text-2xl text-black dark:text-white ml-2">Общая информация</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="p-3 px-4 rounded-lg border-2 border-gray-200 my-1 dark:border-gray-400">--}}
        {{--                        <div class="flex items-center">--}}
        {{--                            <div class="flex-shrink-0 h-10 w-10">--}}
        {{--                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=MinusD&amp;color=7F9CF5&amp;background=EBF4FF" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="ml-4">--}}
        {{--                                <div class="text-xl leading-5 font-medium font-semibold text-gray-900 dark:text-gray-200">--}}
        {{--                                    MinusD&nbsp;-&nbsp;Димон--}}
        {{--                                </div>--}}
        {{--                                <div class="text-md leading-5 text-gray-500 dark:text-gray-400">lukovnikov50@mail.ru</div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden p-2 mt-2 rounded-lg border-2 border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-400">--}}
        {{--                        <tbody class="flex-1 sm:flex-none w-full">--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Голосовой&nbsp;множитель&nbsp;коинов--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Текстовый&nbsp;множитель&nbsp;коинов--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Голосовой&nbsp;множитель&nbsp;опыта--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Текстовый&nbsp;множитель&nbsp;опыта--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                <span>+</span> <span class="font-bold underline"> 0</span><span class="text-sm">%</span>--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                ID&nbsp;Discord--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                313743412626980865--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Зарегистрирован--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                2021-08-31 19:57:26--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}

        {{--                        </tbody>--}}
        {{--                    </table>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="mb-4 ">--}}
        {{--                <div class="shadow-lg rounded-2xl bg-white dark:bg-gray-700 w-full">--}}
        {{--                    <p class="font-bold text-md p-4 text-black dark:text-white">--}}
        {{--                        Миссии на сегодня--}}
        {{--                        <span class="text-sm text-gray-500 dark:text-gray-300 dark:text-white ml-2">--}}
        {{--                                            (2/7 - 5)--}}
        {{--                                        </span>--}}
        {{--                    </p>--}}
        {{--                    <ul>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    01--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                    Текст миссии №1--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    02--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                    Текст миссии №2--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    03--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                    Текст миссии №3--}}
        {{--                                                </span>--}}










        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-400 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    04--}}
        {{--                                                </span>--}}
        {{--                                <span class="line-through">--}}
        {{--                                                    Текст выполненноё миссии--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-400  justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    05--}}
        {{--                                                </span>--}}
        {{--                                <span class="line-through">--}}
        {{--                                                    Текст миссии №много--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}

        {{--                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    06--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                     Текст миссии №6--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    07--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                     Текст миссии №7--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                    </ul>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="w-full xl:w-1/3">--}}
        {{--            <div class="mb-4">--}}
        {{--                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">--}}
        {{--                    <div class="flex items-center justify-between mb-3">--}}
        {{--                        <div class="flex items-center">--}}

        {{--                            <div class="flex flex-col">--}}
        {{--                                <span class="font-bold text-2xl text-black dark:text-white ml-2">Общая информация</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="p-3 px-4 rounded-lg border-2 border-gray-200 my-1 dark:border-gray-400">--}}
        {{--                        <div class="flex items-center">--}}
        {{--                            <div class="flex-shrink-0 h-10 w-10">--}}
        {{--                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=MinusD&amp;color=7F9CF5&amp;background=EBF4FF" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="ml-4">--}}
        {{--                                <div class="text-xl leading-5 font-medium font-semibold text-gray-900 dark:text-gray-200">--}}
        {{--                                    MinusD&nbsp;-&nbsp;Димон--}}
        {{--                                </div>--}}
        {{--                                <div class="text-md leading-5 text-gray-500 dark:text-gray-400">lukovnikov50@mail.ru</div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden p-2 mt-2 rounded-lg border-2 border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-400">--}}
        {{--                        <tbody class="flex-1 sm:flex-none w-full">--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Голосовой&nbsp;множитель&nbsp;коинов--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Текстовый&nbsp;множитель&nbsp;коинов--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Голосовой&nbsp;множитель&nbsp;опыта--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Текстовый&nbsp;множитель&nbsp;опыта--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                <span>+</span> <span class="font-bold underline"> 0</span><span class="text-sm">%</span>--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                ID&nbsp;Discord--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                313743412626980865--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                Зарегистрирован--}}
        {{--                            </td>--}}
        {{--                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                2021-08-31 19:57:26--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}

        {{--                        </tbody>--}}
        {{--                    </table>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="mb-4 ">--}}
        {{--                <div class="shadow-lg rounded-2xl bg-white dark:bg-gray-700 w-full">--}}
        {{--                    <p class="font-bold text-md p-4 text-black dark:text-white">--}}
        {{--                        Миссии на сегодня--}}
        {{--                        <span class="text-sm text-gray-500 dark:text-gray-300 dark:text-white ml-2">--}}
        {{--                                            (2/7 - 5)--}}
        {{--                                        </span>--}}
        {{--                    </p>--}}
        {{--                    <ul>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    01--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                    Текст миссии №1--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    02--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                    Текст миссии №2--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    03--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                    Текст миссии №3--}}
        {{--                                                </span>--}}










        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-400 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    04--}}
        {{--                                                </span>--}}
        {{--                                <span class="line-through">--}}
        {{--                                                    Текст выполненноё миссии--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-400  justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    05--}}
        {{--                                                </span>--}}
        {{--                                <span class="line-through">--}}
        {{--                                                    Текст миссии №много--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}

        {{--                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    06--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                     Текст миссии №6--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3">--}}
        {{--                            <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    07--}}
        {{--                                                </span>--}}
        {{--                                <span>--}}
        {{--                                                     Текст миссии №7--}}
        {{--                                                </span>--}}
        {{--                            </div>--}}
        {{--                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                </path>--}}
        {{--                            </svg>--}}
        {{--                        </li>--}}
        {{--                    </ul>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="flex flex-col flex-wrap sm:flex-row ">--}}
        {{--            <div class="w-full sm:w-1/2 xl:w-1/3">--}}
        {{--                <div class="mb-4">--}}
        {{--                    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">--}}
        {{--                        <div class="flex items-center justify-between mb-3">--}}
        {{--                            <div class="flex items-center">--}}

        {{--                                <div class="flex flex-col">--}}
        {{--                                    <span class="font-bold text-2xl text-black dark:text-white ml-2">Общая информация</span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="p-3 px-4 rounded-lg border-2 border-gray-200 my-1 dark:border-gray-400">--}}
        {{--                            <div class="flex items-center">--}}
        {{--                                <div class="flex-shrink-0 h-10 w-10">--}}
        {{--                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=MinusD&amp;color=7F9CF5&amp;background=EBF4FF" alt="">--}}
        {{--                                </div>--}}

        {{--                                <div class="ml-4">--}}
        {{--                                    <div class="text-xl leading-5 font-medium font-semibold text-gray-900 dark:text-gray-200">--}}
        {{--                                        MinusD&nbsp;-&nbsp;Димон--}}
        {{--                                    </div>--}}
        {{--                                    <div class="text-md leading-5 text-gray-500 dark:text-gray-400">lukovnikov50@mail.ru</div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden p-2 mt-2 rounded-lg border-2 border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-400">--}}
        {{--                            <tbody class="flex-1 sm:flex-none w-full">--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Голосовой&nbsp;множитель&nbsp;коинов--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Текстовый&nbsp;множитель&nbsp;коинов--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Голосовой&nbsp;множитель&nbsp;опыта--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    <span>+</span> <span class="font-bold underline">0</span><span class="text-sm">%</span>--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Текстовый&nbsp;множитель&nbsp;опыта--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    <span>+</span> <span class="font-bold underline"> 0</span><span class="text-sm">%</span>--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    ID&nbsp;Discord--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    313743412626980865--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Зарегистрирован--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    2021-08-31 19:57:26--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}

        {{--                            </tbody>--}}
        {{--                        </table>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="mb-4 ">--}}
        {{--                    <div class="shadow-lg rounded-2xl bg-white dark:bg-gray-700 w-full">--}}
        {{--                        <p class="font-bold text-md p-4 text-black dark:text-white">--}}
        {{--                            Миссии на сегодня--}}
        {{--                            <span class="text-sm text-gray-500 dark:text-gray-300 dark:text-white ml-2">--}}
        {{--                                            (2/7 - 5)--}}
        {{--                                        </span>--}}
        {{--                        </p>--}}
        {{--                        <ul>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    01--}}
        {{--                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                    Текст миссии №1--}}
        {{--                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                    <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}
        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    02--}}
        {{--                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                    Текст миссии №2--}}
        {{--                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                    <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}
        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    03--}}
        {{--                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                    Текст миссии №3--}}
        {{--                                                </span>--}}










        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                    <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}
        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-400 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    04--}}
        {{--                                                </span>--}}
        {{--                                    <span class="line-through">--}}
        {{--                                                    Текст выполненноё миссии--}}
        {{--                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}
        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-400  justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    05--}}
        {{--                                                </span>--}}
        {{--                                    <span class="line-through">--}}
        {{--                                                    Текст миссии №много--}}
        {{--                                                </span>--}}
        {{--                                </div>--}}

        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}
        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    06--}}
        {{--                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                     Текст миссии №6--}}
        {{--                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                    <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}
        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                <span class="mx-4">--}}
        {{--                                                    07--}}
        {{--                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                     Текст миссии №7--}}
        {{--                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">--}}
        {{--                                    <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}
        {{--                            </li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="w-full sm:w-1/2 xl:w-1/3">--}}
        {{--                <div class="mb-4 sm:ml-4 xl:mr-4">--}}
        {{--                    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">--}}
        {{--                        <div class="flex items-center justify-between mb-3">--}}
        {{--                            <div class="flex items-center">--}}

        {{--                                <div class="flex flex-col">--}}
        {{--                                    <span class="font-bold text-2xl text-black dark:text-white ml-2">Активность</span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden p-2 mt-2 rounded-lg border-2 border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-400">--}}
        {{--                            <tbody class="flex-1 sm:flex-none w-full">--}}




        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Уровень--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    20--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Количество&nbsp;XP--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    38,160--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Количество&nbsp;коинов--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    37,773--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Голосовая&nbsp;активность--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    21:15:05--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Активность&nbsp;за&nbsp;сутки--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300 uppercase">--}}
        {{--                                    0--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Активность&nbsp;за&nbsp;неделю--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300 uppercase">--}}
        {{--                                    0--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 w-full">--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300">--}}
        {{--                                    Активность&nbsp;за&nbsp;месяц--}}
        {{--                                </td>--}}
        {{--                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate w-full dark:border-gray-400 dark:hover:bg-gray-800 dark:text-gray-300 uppercase">--}}
        {{--                                    0--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                            </tbody>--}}
        {{--                        </table>--}}

        {{--                    </div>--}}
        {{--                </div>--}}

        {{--                <div class="mb-4 mx-0 sm:ml-4 xl:mr-4">--}}
        {{--                    <div class="shadow-lg rounded-2xl bg-white dark:bg-gray-700 w-full">--}}

        {{--                        <p class="font-bold text-md p-4 text-black dark:text-white">--}}
        {{--                            Ежедневные бонусы<span class="text-sm text-gray-500 dark:text-gray-300 dark:text-white ml-2">на  38 неделю--}}
        {{--                                                        </span>--}}
        {{--                        </p>--}}
        {{--                        <ul>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                                <span class="mx-4">--}}
        {{--                                                                    01--}}
        {{--                                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                                Боксик Ten * Ten--}}
        {{--                                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}

        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                                <span class="mx-4">--}}
        {{--                                                                    02--}}
        {{--                                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                                    Бонусная коробочка--}}
        {{--                                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}

        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                                <span class="mx-4">--}}
        {{--                                                                    03--}}
        {{--                                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                                    Бонусная коробочка--}}
        {{--                                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}

        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                                <span class="mx-4">--}}
        {{--                                                                    04--}}
        {{--                                                                </span>--}}
        {{--                                    <span class="">--}}
        {{--                                                                    Подарочный универсальный бустер--}}
        {{--                                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}

        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                                <span class="mx-4">--}}
        {{--                                                                    05--}}
        {{--                                                                </span>--}}
        {{--                                    <span class="">--}}
        {{--                                                                    Боксик Ten * Ten--}}
        {{--                                                                </span>--}}
        {{--                                </div>--}}

        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}

        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                                <span class="mx-4">--}}
        {{--                                                                    06--}}
        {{--                                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                                     Боксик Ten * Ten--}}
        {{--                                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}

        {{--                            </li>--}}
        {{--                            <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3">--}}
        {{--                                <div class="flex items-center justify-start text-sm">--}}
        {{--                                                                <span class="mx-4">--}}
        {{--                                                                    07--}}
        {{--                                                                </span>--}}
        {{--                                    <span>--}}
        {{--                                                                     Подарочный универсальный бустер--}}
        {{--                                                                </span>--}}
        {{--                                </div>--}}
        {{--                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">--}}
        {{--                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">--}}
        {{--                                    </path>--}}
        {{--                                </svg>--}}

        {{--                            </li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--            </div>--}}
        {{--            <div class="w-full sm:w-1/2 xl:w-1/3">--}}
        {{--                <div class="mb-4">--}}
        {{--                    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700">--}}
        {{--                        <div class="flex flex-wrap overflow-hidden">--}}
        {{--                            <div class="w-full rounded shadow-sm">--}}
        {{--                                <div class="flex items-center justify-between mb-4">--}}
        {{--                                    <div class="text-left font-bold text-xl text-black dark:text-white">--}}
        {{--                                        Недавняя активность--}}
        {{--                                    </div>--}}
        {{--                                    <div class="flex space-x-4">--}}
        {{--                                        <button class="p-2 rounded-full bg-blue-500 text-white">--}}
        {{--                                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">--}}
        {{--                                                <path fill="currentColor" d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z">--}}
        {{--                                                </path>--}}
        {{--                                            </svg>--}}
        {{--                                        </button>--}}
        {{--                                        <button class="p-2 rounded-full bg-blue-500 text-white">--}}
        {{--                                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">--}}
        {{--                                                <path fill="currentColor" d="M10 19a1 1 0 0 1-.64-.23a1 1 0 0 1-.13-1.41L13.71 12L9.39 6.63a1 1 0 0 1 .15-1.41a1 1 0 0 1 1.46.15l4.83 6a1 1 0 0 1 0 1.27l-5 6A1 1 0 0 1 10 19z">--}}
        {{--                                                </path>--}}
        {{--                                            </svg>--}}
        {{--                                        </button>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="-mx-2">--}}
        {{--                                    <table class="w-full dark:text-white">--}}
        {{--                                        <tbody>--}}
        {{--                                        <tr>--}}
        {{--                                            <th class="py-3 px-2 md:px-3 ">--}}
        {{--                                                ПН--}}
        {{--                                            </th>--}}
        {{--                                            <th class="py-3 px-2 md:px-3 ">--}}
        {{--                                                ВТ--}}
        {{--                                            </th>--}}
        {{--                                            <th class="py-3 px-2 md:px-3 ">--}}
        {{--                                                СР--}}
        {{--                                            </th>--}}
        {{--                                            <th class="py-3 px-2 md:px-3 ">--}}
        {{--                                                ЧТ--}}
        {{--                                            </th>--}}
        {{--                                            <th class="py-3 px-2 md:px-3 ">--}}
        {{--                                                ПТ--}}
        {{--                                            </th>--}}
        {{--                                            <th class="py-3 px-2 md:px-3 ">--}}
        {{--                                                СБ--}}
        {{--                                            </th>--}}
        {{--                                            <th class="py-3 px-2 md:px-3 ">--}}
        {{--                                                ВС--}}
        {{--                                            </th>--}}
        {{--                                        </tr>--}}
        {{--                                        <tr class="text-gray-400 dark:text-gray-500">--}}
        {{--                                            <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">--}}
        {{--                                                25--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">--}}
        {{--                                                26--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">--}}
        {{--                                                27--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">--}}
        {{--                                                28--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">--}}
        {{--                                                29--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">--}}
        {{--                                                30--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center text-gray-800 cursor-pointer">--}}
        {{--                                                1--}}
        {{--                                            </td>--}}
        {{--                                        </tr>--}}
        {{--                                        <tr>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                2--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 relative px-1  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                3--}}
        {{--                                                <span class="absolute rounded-full h-2 w-2 bg-blue-500 bottom-0 left-1/2 transform -translate-x-1/2">--}}
        {{--                                                            </span>--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                4--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                5--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                6--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                7--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3 md:px-2 relative lg:px-3 hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                8--}}
        {{--                                                <span class="absolute rounded-full h-2 w-2 bg-yellow-500 bottom-0 left-1/2 transform -translate-x-1/2">--}}
        {{--                                                            </span>--}}
        {{--                                            </td>--}}
        {{--                                        </tr>--}}
        {{--                                        <tr>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                9--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                10--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                11--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                12--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  text-center text-white cursor-pointer">--}}
        {{--                                                            <span class="p-2 rounded-full bg-blue-500">--}}
        {{--                                                                13--}}
        {{--                                                            </span>--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                14--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                15--}}
        {{--                                            </td>--}}
        {{--                                        </tr>--}}
        {{--                                        <tr>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                16--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                17--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                18--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                19--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                20--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                21--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                22--}}
        {{--                                            </td>--}}
        {{--                                        </tr>--}}
        {{--                                        <tr>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                23--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                24--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 relative text-center cursor-pointer">--}}
        {{--                                                25--}}
        {{--                                                <span class="absolute rounded-full h-2 w-2 bg-red-500 bottom-0 left-1/2 transform -translate-x-1/2">--}}
        {{--                                                            </span>--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                26--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                27--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                28--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                29--}}
        {{--                                            </td>--}}
        {{--                                        </tr>--}}
        {{--                                        <tr>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                30--}}
        {{--                                            </td>--}}
        {{--                                            <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">--}}
        {{--                                                31--}}
        {{--                                            </td>--}}
        {{--                                            <td>--}}
        {{--                                            </td>--}}
        {{--                                            <td>--}}
        {{--                                            </td>--}}
        {{--                                            <td>--}}
        {{--                                            </td>--}}
        {{--                                            <td>--}}
        {{--                                            </td>--}}
        {{--                                            <td>--}}
        {{--                                            </td>--}}
        {{--                                        </tr>--}}
        {{--                                        </tbody>--}}
        {{--                                    </table>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

</div>
