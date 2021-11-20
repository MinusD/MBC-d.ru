<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Предложения дз
    </span>
</x-slot>

<div>
    <x-modal.card title="Редактирование домашнего задания" blur wire:model.defer="modal">
        <div class="grid grid-cols-1 gap-3">
            <label
                class="block text-sm font-medium text-secondary-700 dark:text-gray-400 ">
                Предмет
                <h1 class="text-xl font-semibold">{{ $hw['subject'] ?? '' }}</h1>
            </label>
            <x-textarea label="Текст задания" wire:model.defer="hw_text">
            </x-textarea>

            <label
                class="block text-sm font-medium text-secondary-700 dark:text-gray-400">
                Дата домашнего задания
            </label>
            <div class="w-full">
                @if($edit_hw_date)
                    <input type="date"
                           class="rounded-md border border-secondary-300 dark:border-secondary-600 bg-gray-100 dark:bg-secondary-800 w-full"
                           wire:model="homework_to_date">
                    <x-errors wire:model.defer="homework_to_date"/>
                    <x-button primary label="Не изменять" wire:click="edit_homework_date_btn(0)" class="mt-2"/>
                @else
                    <div
                        class="text-lg px-3 mb-2 inline-flex rounded-md text-gray-800 bg-gray-100 dark:text-gray-200 dark:bg-gray-600">
                        {{ mb_substr($hw['to_date']  ?? '', 0, -8)}}</div>
                    <x-button primary label="Изменить" wire:click="edit_homework_date_btn(1)"/>
                @endif
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-1" x-data="{confirm: false}">
                <div class="flex">
                    <x-button negative class="mr-2" @click="confirm = !confirm" icon="trash" label="Удалить"/>
                    <x-button negative outline
                              x-show="confirm"
                              class="transition"
                              label="Я уверен"
                              wire:click="reject_hw"
                              @click="confirm = false"
                              x-transition:enter="transition ease-out duration-200"
                              x-transition:enter-start="transform opacity-0 scale-95"
                              x-transition:enter-end="transform opacity-100 scale-100"/>
                </div>
                <div class="flex">
                    <x-button flat label="Отменить" x-on:click="close" class="mr-2"/>
                    <x-button primary label="Сохранить" wire:click="confirm_homework"/>
                </div>
            </div>
        </x-slot>
    </x-modal.card>

    <div class="overflow-auto pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">
        @forelse($homeworks as $key => $item)
            <div class="flex-initial mb-4 w-full md:w-1/2 md:pl-3 lg:pl-3 xl:w-1/3  xl:pr-3 self-auto ">
                <div class="shadow-lg rounded-2xl p-1 pt-2 bg-white dark:bg-gray-700 w-full h-full text-center">
                    <div
                        class="flex justify-between items-center rounded-md px-1 py-2 ">
                        <div class="ml-3 ">
                                <span
                                    class="text-black font-semibold sm:text-lg md:text-base 2xl:text-lg dark:text-gray-200">@if(mb_strlen($item['subject']) < 22) {{ $item['subject'] }}
                                    @else {{ mb_substr($item['subject'], 0, 20) . "..." }} @endif</span>
                        </div>
                        <div class="w-1/4 items-center text-center flex">
                            <x-button primary label="Подробнее" wire:click="open_offer({{ $key }})"></x-button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            Предложений нет
        @endforelse
    </div>
</div>
