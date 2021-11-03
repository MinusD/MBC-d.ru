<div>
    <div class="overflow-auto pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                {{--                <div class="flex items-center justify-between mb-3">--}}
                {{--                    <div class="flex items-center">--}}
                {{--                        <div class="flex flex-col">--}}
                {{--                            <span class="font-bold text-2xl text-black dark:text-white ml-2">Участники&nbsp;группы</span>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData1->reactiveKey() }}"
                        :pie-chart-model="$ChartData1"
                    />
                </div>
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
                        <button type="button" wire:click="open_add_homework_modal"
                                class="w-full h-full focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform transition hover:scale-105">
                            Добавить&nbsp;ДЗ
                        </button>
                    </div>
                    <div class="p-2">
                        <button type="button" wire:click="open_add_student_modal"
                                class="w-full h-full focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform transition hover:scale-105">
                            Добавить участника
                        </button>
                    </div>
                    <div class="p-2">
                        <button type="button" wire:click="open_invite_link_edit_modal"
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
    </div>
</div>
