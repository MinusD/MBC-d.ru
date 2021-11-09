<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Экспорт данных
    </span>
</x-slot>

<div>
    <div class="overflow-auto pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">
        <div class="flex-initial mb-4 w-full xl:w-1/2 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex flex-col">
                            <span
                                class="font-bold text-2xl text-black dark:text-white ml-2">Экспорт</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <x-button primary label="Экспорт данных" wire:click="export_data"></x-button>
                    <x-button primary label="Экспорт cтатистики" wire:click="export_stats"></x-button>
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/2 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex flex-col">
                            <span
                                class="font-bold text-2xl text-black dark:text-white ml-2">Импорт</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <x-button primary label="Импорт данных" wire:click="export_data"></x-button>
                    <x-button primary label="Импорт статистики" wire:click="import_stats"></x-button>
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/2 xl:pr-3 self-auto">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <div class="flex flex-col">
                        <span class="font-bold text-2xl text-black dark:text-white ml-2">Поле экспорта данных</span>
                    </div>
                </div>
            </div>
            <x-textarea wire:model="data_result"></x-textarea>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/2 xl:pr-3 self-auto">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <div class="flex flex-col">
                        <span class="font-bold text-2xl text-black dark:text-white ml-2">Поле импорта данных</span>
                    </div>
                </div>
            </div>
            <x-textarea wire:model="import_stats"></x-textarea>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/2 xl:pr-3 self-auto">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <div class="flex flex-col">
                        <span class="font-bold text-2xl text-black dark:text-white ml-2">Поле экспорта статистики</span>
                    </div>
                </div>
            </div>
            <x-textarea wire:model="stats_result"></x-textarea>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/2 xl:pr-3 self-auto">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <div class="flex flex-col">
                        <span class="font-bold text-2xl text-black dark:text-white ml-2">Поле импорта статистики</span>
                    </div>
                </div>
            </div>
            <x-textarea wire:model="import_stats"></x-textarea>
        </div>
    </div>
</div>
