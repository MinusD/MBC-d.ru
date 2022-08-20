<x-slot name="header">
    <span class="mbc-dashboard-header">
        Моя группа
    </span>
</x-slot>

<div>
    <x-modal.card title="Добавление домашнего задания" blur wire:model.defer="add_homework_modal_is_open">
        <div class="my-2">
            <span class="font-bold">Внимание!</span> Если вы до этого не добавляли новых студентов,
            прочтите <a href="#" class="text-blue-500 underline">краткую инструкция</a> или посмотрите <a href="#"
                                                                                                          class="text-blue-500 underline">видео</a>.
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Фамилия
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_sname"/>
                </div>
            </div>
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Имя
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_name"/>
                </div>
            </div>
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Отчество <span class="text-xs text-gray-500 ">(При наличии)</span>
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_pname"/>
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                <div class="flex">
                    <x-button flat primary class="mr-2" @click="confirm = !confirm" label=""/>
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

    <x-modal.card title="Добавление студента в группу" blur wire:model.defer="add_student_modal_is_open">
        <div class="my-2">
            <span class="font-bold">Внимание!</span> Если вы до этого не добавляли новых студентов,
            прочтите <a href="#" class="text-blue-500 underline">краткую инструкция</a> или посмотрите <a href="#"
                                                                                                          class="text-blue-500 underline">видео</a>.
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Фамилия
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_sname"/>
                </div>
            </div>
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Имя
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_name"/>
                </div>
            </div>
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Отчество <span class="text-xs text-gray-500 ">(При наличии)</span>
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_pname"/>
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                <div class="flex">
                    <x-button flat primary class="mr-2" @click="confirm = !confirm" label=""/>
                </div>
                <div class="flex">
                    <x-button flat label="Отменить" x-on:click="close"/>
                    <x-button primary label="Добавить" wire:click="act_add_student"/>
                </div>
            </div>
        </x-slot>
    </x-modal.card>

    <x-modal.card title="Изменение данных студента" blur wire:model.defer="edit_user_modal_is_open">
        <div class="grid grid-cols-1 gap-4">
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Фамилия
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_sname"/>
                </div>
            </div>
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Имя
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_name"/>
                </div>
            </div>
            <div class="">
                <div class="flex justify-between mb-1">
                    <label class="mbc-dashboard-label">
                        Отчество <span class="mbc-dashboard-label-extra">(При наличии)</span>
                    </label>
                </div>
                <div class="mbc-dashboard-modal-card-container">
                    <x-input wire:model.defer="new_stunent_pname"/>
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                <div class="flex">
                    <x-button flat primary class="mr-2" @click="confirm = !confirm" label=""/>
                </div>
                <div class="flex">
                    <x-button flat label="Отменить" x-on:click="close" wire:click="clear_news_labels"/>
                    <x-button primary label="Изменить" wire:click="confirm_edit_modal"/>
                </div>
            </div>
        </x-slot>
    </x-modal.card>

    <x-modal.card title="Настройки приглашений в группу" blur wire:model.defer="invite_link_edit_model_is_open">
        @if(isset($invite->token) && is_null($invite->deleted_at))
            <div class="grid grid-cols-1 gap-4" x-data="{show_link: false}">
                <div class="text-md ">Ссылка-приглашение: <a target="_blank" class="underline text-blue-400"
                                                             href="{{ route('landing.reg_by_code') . "?t=" . $invite->token }}">{{ mb_substr($invite->token, 0, 12) . "..." }}</a>
                </div>
                <div x-show="show_link" x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100" class="text-md select-all">
                    <code>{{ route('landing.reg_by_code') . "?t=" . $invite->token }}</code></div>
                <x-button positive class="mr-2" @click="show_link = !show_link" label="Показать/скрыть ссылку"/>
                <x-button primary class="mr-2" wire:click="generate_new_invite_link"
                          label="Сгенерировать новую ссылку"/>
                <x-button warning class="mr-2" wire:click="deactivate_invite_link" label="Деактивироовать ссылку"/>
            </div>
            <x-slot name="footer">
                <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                    <div class="flex"></div>
                    <div class="flex">
                        <x-button flat label="Отменить" x-on:click="close"/>
                    </div>
                </div>
            </x-slot>
        @else
            <div
                class="relative shadow-lg rounded-2xl p-4 bg-gray-200 dark:bg-gray-800 w-full flex items-center justify-center h-64">
                <x-button md primary wire:click="generate_invite">Сгенерировать приглашение</x-button>
                <div class="absolute text-xs text-gray-200 bottom-1 right-2">Если кнопка не реагирует, перезагрузите
                    страницу
                </div>
            </div>
        @endif
    </x-modal.card>


    <div class="mbc-dashboard-cards-grid">
        <div class="mbc-dashboard-card-base xl:w-1/3">
            <div class="mbc-dashboard-card-base-in h-full">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex flex-col">
                            <span class="mbc-dashboard-card-title">Действия</span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 ">
                    <div class="p-2">
                        <a href="{{ route('headman.homework') . "?act=add-homework" }}">
                            <button type="button"
                                    class="mbc-headman-spec-btn">
                                Добавить ДЗ
                            </button>
                        </a>
                    </div>
                    <div class="p-2">
                        <button type="button"
                                wire:click="open_add_student_modal"
                                class="mbc-headman-spec-btn">
                            Добавить участника
                        </button>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('headman.services') . "?act=fast-group" }}">
                            <button type="button"
                                    class="mbc-headman-spec-btn">
                                Быстрое добавление
                            </button>
                        </a>
                    </div>
                    <div class="p-2">
                        <button type="button"
                                wire:click="open_invite_link_edit_modal"
                                class="mbc-headman-spec-btn">
                            Приглашения
                        </button>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('headman.applications') }}">
                            <button
                                class="mbc-headman-spec-btn @if($group_applications_counter > 0) mbc-headman-spec-btn-isset  @endif">
                                Заявки ({{$group_applications_counter}})
                            </button>
                        </a>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('headman.homeworks-applications') }}">
                            <button type="button"
                                    class="mbc-headman-spec-btn @if($homeworks_applications_counter > 0) mbc-headman-spec-btn-isset  @endif">
                                Предложения ДЗ ({{$homeworks_applications_counter}})
                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="mbc-dashboard-card-base xl:w-2/3">
            <div class="mbc-dashboard-card-base-in">
                <div class="flex items-center justify-between mb-3">
                    <span class="mbc-dashboard-card-title">Участники группы</span>
                </div>
                <table class="min-w-max w-full table-auto  border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-600">
                    <thead class="">
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal rounded-t-full ">
                        <th class="table-cell md:hidden py-3 px-6 text-left rounded-tl-md ">ФИО</th>
                        <th class="hidden md:table-cell py-3 px-6 text-left rounded-tl-md">Фамилия</th>
                        <th class="hidden md:table-cell py-3 px-6 text-left">Имя</th>
                        <th class="hidden md:table-cell py-3 px-6 text-center">Отчество</th>
                        <th class="py-3 text-center">Статус</th>
                        <th class="py-3 px-6 text-center rounded-tr-md">Действия</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light dark:text-gray-300">
                    @forelse($students as $key => $student)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-500 dark:hover:bg-gray-800 {{ $key%2 ? 'bg-gray-50 dark:bg-gray-800' : '' }}">
                            <td class="table-cell md:hidden py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span
                                        class="font-medium">{{ $student->sname . " " . mb_substr($student->name, 0, 1) . ". " .  mb_substr($student->pname, 0, 1) . "."  }} </span>
                                </div>
                            </td>
                            <td class="hidden md:table-cell py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $student->sname }} </span>
                                </div>
                            </td>
                            <td class="hidden md:table-cell py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $student->name }}</span>
                                </div>
                            </td>
                            <td class="hidden md:table-cell py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <span>{{ $student->pname }}</span>
                                </div>
                            </td>
                            <td class=" text-center">
                                <div class="flex item-center justify-center">
                                    @if(isset($student->email))
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mbc-dashboard-table-svg-ok"
                                             fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mbc-dashboard-table-svg-wait"
                                             fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    @endif
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
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                         wire:click="open_edit_student_modal({{$key}})"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                         wire:click="delete_user({{$student->id}})">
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
        </div>

    </div>
</div>
