<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Домашнее задания ADMIN
    </span>
</x-slot>

<div>
    <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-10 md:h-16 rounded-md md:rounded-2xl z-40 mb-2">
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
                        {{--                        <div class="hidden md:block">--}}
                        {{--                            <x-button icon="folder-add" primary label="Новая папка" wire:click="new_folder"/>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="hidden md:block">--}}
                        {{--                            <x-button icon="document-add" positive label="Новая пин" wire:click="new_pin"/>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="block md:hidden">--}}
                        {{--                            <x-button lg icon="folder-add" primary wire:click="new_folder"/>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="block md:hidden">--}}
                        {{--                            <x-button lg icon="document-add" positive wire:click="new_pin"/>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                    <div class="hidden md:block">
                        <x-button icon="plus-circle" primary wire:click="openModal">Новое ДЗ</x-button>
                    </div>
                    <div class="block md:hidden">
                        <x-button lg icon="plus-circle" primary wire:click="new_folder"/>
                    </div>

                </div>
            </div>
        </div>
    </header>

{{--    <div class="relative flex flex-col pr-0 md:pr-3">--}}
{{--        <div class="grid mt-8 gap-8 grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3">--}}
{{--            <div class="flex flex-col">--}}
{{--                <div class="bg-white dark:bg-gray-700 shadow-md  rounded-3xl p-4">--}}
{{--                    <div class="flex-none lg:flex">--}}
{{--                        <div class="flex-auto ml-3 justify-evenly py-2">--}}
{{--                            <div class="flex flex-wrap ">--}}
{{--                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">--}}
{{--                                    Shop--}}
{{--                                </div>--}}
{{--                                <h2 class="flex-auto text-lg font-medium text-gray-800 dark:text-gray-200">Massive Dynamic</h2>--}}
{{--                            </div>--}}
{{--                            <p class="mt-3"></p>--}}
{{--                            <div class="flex py-4  text-sm text-gray-500">--}}
{{--                                <div class="flex-1 inline-flex items-center">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400"--}}
{{--                                         fill="none"--}}
{{--                                         viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">--}}
{{--                                        </path>--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>--}}
{{--                                    </svg>--}}
{{--                                    <p class="">Cochin,KL</p>--}}
{{--                                </div>--}}
{{--                                <div class="flex-1 inline-flex items-center">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400"--}}
{{--                                         fill="none"--}}
{{--                                         viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                                    </svg>--}}
{{--                                    <p class="">05-25-2021</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex p-4 pb-2 border-t border-gray-200 "></div>--}}
{{--                            <div class="flex space-x-3 text-sm font-medium">--}}
{{--                                <div class="flex-auto flex space-x-3">--}}
{{--                                    <button--}}
{{--                                        class="mb-2 md:mb-0 bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">--}}
{{--                                    <span class="text-green-400 hover:text-green-500 rounded-lg">--}}
{{--                                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="shopify"--}}
{{--                                             class="svg-inline--fa fa-shopify  w-5 h-5  " role="img"--}}
{{--                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">--}}
{{--                                            <path fill="currentColor"--}}
{{--                                                  d="M388.32,104.1a4.66,4.66,0,0,0-4.4-4c-2,0-37.23-.8-37.23-.8s-21.61-20.82-29.62-28.83V503.2L442.76,472S388.72,106.5,388.32,104.1ZM288.65,70.47a116.67,116.67,0,0,0-7.21-17.61C271,32.85,255.42,22,237,22a15,15,0,0,0-4,.4c-.4-.8-1.2-1.2-1.6-2C223.4,11.63,213,7.63,200.58,8c-24,.8-48,18-67.25,48.83-13.61,21.62-24,48.84-26.82,70.06-27.62,8.4-46.83,14.41-47.23,14.81-14,4.4-14.41,4.8-16,18-1.2,10-38,291.82-38,291.82L307.86,504V65.67a41.66,41.66,0,0,0-4.4.4S297.86,67.67,288.65,70.47ZM233.41,87.69c-16,4.8-33.63,10.4-50.84,15.61,4.8-18.82,14.41-37.63,25.62-50,4.4-4.4,10.41-9.61,17.21-12.81C232.21,54.86,233.81,74.48,233.41,87.69ZM200.58,24.44A27.49,27.49,0,0,1,215,28c-6.4,3.2-12.81,8.41-18.81,14.41-15.21,16.42-26.82,42-31.62,66.45-14.42,4.41-28.83,8.81-42,12.81C131.33,83.28,163.75,25.24,200.58,24.44ZM154.15,244.61c1.6,25.61,69.25,31.22,73.25,91.66,2.8,47.64-25.22,80.06-65.65,82.47-48.83,3.2-75.65-25.62-75.65-25.62l10.4-44s26.82,20.42,48.44,18.82c14-.8,19.22-12.41,18.81-20.42-2-33.62-57.24-31.62-60.84-86.86-3.2-46.44,27.22-93.27,94.47-97.68,26-1.6,39.23,4.81,39.23,4.81L221.4,225.39s-17.21-8-37.63-6.4C154.15,221,153.75,239.8,154.15,244.61ZM249.42,82.88c0-12-1.6-29.22-7.21-43.63,18.42,3.6,27.22,24,31.23,36.43Q262.63,78.68,249.42,82.88Z">--}}
{{--                                            </path>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                        <span>62 Products</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <button--}}
{{--                                    class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"--}}
{{--                                    type="button" aria-label="like">Редактировать--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="flex flex-col ">--}}
{{--                <div class="bg-white shadow-md  rounded-3xl p-4">--}}
{{--                    <div class="flex-none lg:flex">--}}
{{--                        <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">--}}
{{--                            <img--}}
{{--                                src="https://images.unsplash.com/photo-1585399000684-d2f72660f092?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80"--}}
{{--                                alt="Just a flower"--}}
{{--                                class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">--}}
{{--                        </div>--}}
{{--                        <div class="flex-auto ml-3 justify-evenly py-2">--}}
{{--                            <div class="flex flex-wrap ">--}}
{{--                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">--}}
{{--                                    Shop--}}
{{--                                </div>--}}
{{--                                <h2 class="flex-auto text-lg font-medium">Umbrella Corporation</h2>--}}
{{--                            </div>--}}
{{--                            <p class="mt-3"></p>--}}
{{--                            <div class="flex py-4  text-sm text-gray-500">--}}
{{--                                <div class="flex-1 inline-flex items-center">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400"--}}
{{--                                         fill="none"--}}
{{--                                         viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">--}}
{{--                                        </path>--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>--}}
{{--                                    </svg>--}}
{{--                                    <p class="">Mumbai,MH</p>--}}
{{--                                </div>--}}
{{--                                <div class="flex-1 inline-flex items-center">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400"--}}
{{--                                         fill="none"--}}
{{--                                         viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                                    </svg>--}}
{{--                                    <p class="">05-25-2021</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex p-4 pb-2 border-t border-gray-200 "></div>--}}
{{--                            <div class="flex space-x-3 text-sm font-medium">--}}
{{--                                <div class="flex-auto flex space-x-3">--}}
{{--                                    <button--}}
{{--                                        class="mb-2 md:mb-0 bg-white px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">--}}
{{--                                    <span class="text-green-400 hover:text-green-500 rounded-lg">--}}
{{--                                       <img src="https://image.flaticon.com/icons/png/512/168/168810.png"--}}
{{--                                            class="svg-inline--fa fa-shopify  w-5 h-5 "/>--}}
{{--                                    </span>--}}
{{--                                        <span>60 Products</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <button--}}
{{--                                    class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"--}}
{{--                                    type="button" aria-label="like">Edit Shop--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
