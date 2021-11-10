<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Статистика проект
    </span>
</x-slot>

<div>
    <div class="overflow-auto pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0 flex flex-wrap items-stretch">
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData1->reactiveKey() }}"
                        :pie-chart-model="$ChartData1"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData2->reactiveKey() }}"
                        :pie-chart-model="$ChartData2"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData3->reactiveKey() }}"
                        :pie-chart-model="$ChartData3"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData4->reactiveKey() }}"
                        :pie-chart-model="$ChartData4"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData5->reactiveKey() }}"
                        :pie-chart-model="$ChartData5"
                    />
                </div>
            </div>
        </div>
        <div class="flex-initial mb-4 w-full xl:w-1/3 xl:pr-3 self-auto ">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class=" rounded px-4 pt-2 bg-white dark:bg-gray-200" style="height: 24rem;">
                    <livewire:livewire-pie-chart
                        key="{{ $ChartData6->reactiveKey() }}"
                        :pie-chart-model="$ChartData6"
                    />
                </div>
            </div>
        </div>
    </div>

</div>
