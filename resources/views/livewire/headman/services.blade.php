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


    <div class="overflow-auto pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">
        <div class="flex-initial mb-4 w-full md:w-1/2 xl:w-1/3 2xl:w-1/4 xl:pr-3 self-auto cursor-pointer"
             wire:click="open_token_menu">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full h-full text-center">
                <span class="font-bold text-2xl text-black dark:text-white ml-2">Токен для расширения</span>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full md:w-1/2 xl:w-1/3 2xl:w-1/4 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full h-full text-center">
                <span class="font-bold text-2xl text-black dark:text-white ml-2">Токен для расширения</span>
            </div>
        </div>
    </div>
</div>
