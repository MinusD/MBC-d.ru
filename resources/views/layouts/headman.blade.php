<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <wireui:scripts/>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

</head>
<body class="font-sans antialiased">
<x-dialog z-index="z-50" blur="md" align="center"/>
<main class="bg-gray-100 dark:bg-gray-800 relative h-screen overflow-hidden ">
    <div class="flex items-start justify-between">
        <div class="h-screen hidden lg:block my-4 ml-4 shadow-lg relative w-80">
            <div class="bg-white h-full rounded-2xl  dark:bg-gray-700">
                <div class="flex items-center justify-center pt-6 ">
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap');
                    </style>
                    <span class="text-3xl text-gray-800 dark:text-gray-100 font-semibold "><span class="font-bold"
                                                                                                 style="font-family: 'Otomanopee One', sans-serif;">MBC</span> Studio</span>

                </div>

                <nav class="mt-2 p-2">
                    <div class="mb-2">
                        <a href="{{ route('headman.dashboard') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-100  {{ (request()->routeIs('headman.dashboard')) ? " bg-indigo-300 font-bold dark:text-gray-500 dark:bg-gray-100" : "bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-gray-400">
							<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
								<path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
							</svg>
						</span>
                            <span class="ml-3">Главная</span>
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('student.schedule') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-100 {{ (request()->routeIs('student.schedule')) ? " bg-indigo-300 font-bold dark:text-gray-500 dark:bg-gray-100" : "bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
						</span>
                            <span class="ml-3">Расписание</span>
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('student.homework') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-100  {{ (request()->routeIs('student.homework')) ? " bg-indigo-300 font-bold dark:text-gray-500 dark:bg-gray-100" : "bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
						</span>
                            <span class="ml-3">Домашнее задание</span>
                        </a>
                    </div>

                    <div class="mb-2">
                        <a href=""
                           class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-100  {{ (request()->routeIs('admin.boxes')) ? " bg-indigo-300 font-bold dark:text-gray-500 dark:bg-gray-100" : "bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
						</span>
                            <span class="ml-3">Расписание</span>
                        </a>
                    </div>


{{--                    <div x-data="{ open: false }" class="mb-2">--}}
{{--                        <a role="button"--}}
{{--                           @click="$event.preventDefault(); open = !open"--}}
{{--                           aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"--}}
{{--                           class="flex flex-row items-center h-12 px-4 rounded-lg bg-gray-50 text-gray-600 dark:bg-gray-700 dark:text-gray-400 hover:bg-indigo-200 dark:hover:text-gray-600 dark:hover:bg-indigo-400"--}}
{{--                           :class="{ 'bg-indigo-200 dark:bg-indigo-400 dark:text-gray-600': open }">--}}
{{--						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-gray-400">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"--}}
{{--                                 stroke="currentColor">--}}
{{--                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>--}}
{{--                            </svg>--}}
{{--                        </span>--}}
{{--                            <span class="ml-3">Расписание</span>--}}
{{--                            <span aria-hidden="true" class="ml-auto">--}}
{{--                <!-- active class 'rotate-180' -->--}}
{{--                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"--}}
{{--                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>--}}
{{--                </svg>--}}
{{--                </span>--}}
{{--                        </a>--}}
{{--                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu">--}}
{{--                            <a href="" role="menuitem"--}}
{{--                               class="block p-2 text-sm text-gray-400 transition-colors duration-200  rounded-md dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100">--}}
{{--                                Все--}}
{{--                            </a>--}}
{{--                            <a href="" role="menuitem"--}}
{{--                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100">--}}
{{--                                Активные--}}
{{--                            </a>--}}
{{--                            <a href="" role="menuitem"--}}
{{--                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100">--}}
{{--                                Добавить--}}
{{--                            </a>--}}
{{--                            --}}{{--                            <a href="{{ route('admin.users.exits') }}" role="menuitem"--}}
{{--                            --}}{{--                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100">--}}
{{--                            --}}{{--                                Вышедшие пользователи--}}
{{--                            --}}{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="mb-2">
                        <a href="" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z"></path>
                            </svg>
						</span>
                            <span class="ml-3 ">Вернуться</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="flex flex-col w-full pl-0 md:p-4 md:space-y-4">
            <header
                class="hidden lg:block w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40">
                <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
                    <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                        <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">
                            @if (isset($header))
                                {{ $header }}
                            @else
                                <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100 ">
                                    Панель старосты
                                </span>
                            @endif
                        </div>
                        <div
                            class="hidden md:flex relative p-1  items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                            <div x-data>
                                <button type="button" aria-label="Color Mode" @click="switchTheme()"
                                        class="flex justify-center p-2 text-gray-500 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md lg:bg-white lg:dark:bg-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-700 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                              clip-rule="evenodd"></path>
                                    </svg> <!----></button>
                                <script>
                                    function switchTheme() {
                                        if (localStorage.theme === 'dark') {
                                            localStorage.theme = 'light'
                                        } else {
                                            localStorage.theme = 'dark'
                                        }
                                        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                                            document.documentElement.classList.add('dark')
                                        } else {
                                            document.documentElement.classList.remove('dark')
                                        }
                                    }
                                </script>
                            </div>
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <!-- Teams Dropdown -->

                                <!-- Settings Dropdown -->
                                <div class="relative">
                                    <x-jet-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <button
                                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                    <img class="h-8 w-8 rounded-full object-cover"
                                                         src="{{ Auth::user()->profile_photo_url }}"
                                                         alt="{{ Auth::user()->name }}"/>
                                                </button>
                                            @else
                                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </span>
                                            @endif
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Управление аккаунтом') }}
                                            </div>

                                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Профиль') }}
                                            </x-jet-dropdown-link>

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                    {{ __('API Tokens') }}
                                                </x-jet-dropdown-link>
                                            @endif

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    {{ __('Выйти') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
            <header
                class="block lg:hidden w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40"
                @click.away="open = false" x-data="{ open: false }">

                <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
                    <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                        <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">
                            @if (isset($header))
                                {{ $header }}
                            @else
                                <span class="text-xl font-bold text-gray-900 dark:text-gray-100 ">
                                    Панель старосты
                                </span>
                            @endif
                        </div>

                        <button type="button" aria-label="Color Mode" @click="switchTheme()"
                                class="flex justify-center p-2 text-gray-500 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md lg:bg-white lg:dark:bg-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-700 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 class="w-5 h-5">
                                <path fill-rule="evenodd"
                                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                      clip-rule="evenodd"></path>
                            </svg> <!----></button>
                        <div
                            class="flex relative p-1 items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto mb-3">
                            <div>

                                <button class="rounded-lg focus:outline-none focus:shadow-outline pl-12 right-0"
                                        @click="open = !open">
                                    <div class="block w-5 transform -translate-x-1/2 -translate-y-1/2">
                        <span aria-hidden="true"
                              class="block absolute h-0.5 w-5 bg-gray-800 dark:bg-white transform transition duration-500 ease-in-out"
                              :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                                        <span aria-hidden="true"
                                              class="block absolute  h-0.5 w-5 bg-gray-800 dark:bg-white transform transition duration-500 ease-in-out"
                                              :class="{'opacity-0': open } "></span>
                                        <span aria-hidden="true"
                                              class="block absolute  h-0.5 w-5 bg-gray-800 dark:bg-white transform  transition duration-500 ease-in-out"
                                              :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                                    </div>
                                </button>
                            </div>
                            {{--                            <div>--}}
                            {{--                                <button type="button" aria-label="Color Mode" @click="switchTheme()"--}}
                            {{--                                        class="flex justify-center p-2 text-gray-500 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md lg:bg-white lg:dark:bg-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-700 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50">--}}
                            {{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"--}}
                            {{--                                         class="w-5 h-5">--}}
                            {{--                                        <path fill-rule="evenodd"--}}
                            {{--                                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"--}}
                            {{--                                              clip-rule="evenodd"></path>--}}
                            {{--                                    </svg> <!----></button>--}}
                            {{--                                <script>--}}
                            {{--                                    function switchTheme() {--}}
                            {{--                                        if (localStorage.theme === 'dark') {--}}
                            {{--                                            localStorage.theme = 'light'--}}
                            {{--                                        } else {--}}
                            {{--                                            localStorage.theme = 'dark'--}}
                            {{--                                        }--}}
                            {{--                                        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
                            {{--                                            document.documentElement.classList.add('dark')--}}
                            {{--                                        } else {--}}
                            {{--                                            document.documentElement.classList.remove('dark')--}}
                            {{--                                        }--}}
                            {{--                                    }--}}
                            {{--                                </script>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="hidden sm:flex sm:items-center sm:ml-6">--}}
                            {{--                                <!-- Teams Dropdown -->--}}

                            {{--                                <!-- Settings Dropdown -->--}}
                            {{--                                <div class="relative">--}}
                            {{--                                    <x-jet-dropdown align="right" width="48">--}}
                            {{--                                        <x-slot name="trigger">--}}
                            {{--                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())--}}
                            {{--                                                <button--}}
                            {{--                                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">--}}
                            {{--                                                    <img class="h-8 w-8 rounded-full object-cover"--}}
                            {{--                                                         src="{{ Auth::user()->profile_photo_url }}"--}}
                            {{--                                                         alt="{{ Auth::user()->name }}"/>--}}
                            {{--                                                </button>--}}
                            {{--                                            @else--}}
                            {{--                                                <span class="inline-flex rounded-md">--}}
                            {{--                                    <button type="button"--}}
                            {{--                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">--}}
                            {{--                                        {{ Auth::user()->name }}--}}

                            {{--                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"--}}
                            {{--                                             viewBox="0 0 20 20" fill="currentColor">--}}
                            {{--                                            <path fill-rule="evenodd"--}}
                            {{--                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"--}}
                            {{--                                                  clip-rule="evenodd"/>--}}
                            {{--                                        </svg>--}}
                            {{--                                    </button>--}}
                            {{--                                </span>--}}
                            {{--                                            @endif--}}
                            {{--                                        </x-slot>--}}

                            {{--                                        <x-slot name="content">--}}
                            {{--                                            <!-- Account Management -->--}}
                            {{--                                            <div class="block px-4 py-2 text-xs text-gray-400">--}}
                            {{--                                                {{ __('Управление аккаунтом') }}--}}
                            {{--                                            </div>--}}

                            {{--                                            <x-jet-dropdown-link href="{{ route('profile.show') }}">--}}
                            {{--                                                {{ __('Профиль') }}--}}
                            {{--                                            </x-jet-dropdown-link>--}}

                            {{--                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())--}}
                            {{--                                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">--}}
                            {{--                                                    {{ __('API Tokens') }}--}}
                            {{--                                                </x-jet-dropdown-link>--}}
                            {{--                                            @endif--}}

                            {{--                                            <div class="border-t border-gray-100"></div>--}}

                            {{--                                            <!-- Authentication -->--}}
                            {{--                                            <form method="POST" action="{{ route('logout') }}">--}}
                            {{--                                                @csrf--}}

                            {{--                                                <x-jet-dropdown-link href="{{ route('logout') }}"--}}
                            {{--                                                                     onclick="event.preventDefault();--}}
                            {{--                                                this.closest('form').submit();">--}}
                            {{--                                                    {{ __('Выйти') }}--}}
                            {{--                                                </x-jet-dropdown-link>--}}
                            {{--                                            </form>--}}
                            {{--                                        </x-slot>--}}
                            {{--                                    </x-jet-dropdown>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>

                    </div>
                    <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                        {{--                        <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">--}}
                        {{--                            @if (isset($header))--}}
                        {{--                                {{ $header }}--}}
                        {{--                            @else--}}
                        {{--                                <span class="text-md font-bold text-gray-900 dark:text-gray-100 ">--}}
                        {{--                                    Административная панель--}}
                        {{--                                </span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        <div>


                        </div>

                        {{--                        <div--}}
                        {{--                            class="flex relative p-1  items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">--}}
                        {{--                            <div x-data>--}}
                        {{--                                <button type="button" aria-label="Color Mode" @click="switchTheme()"--}}
                        {{--                                        class="flex justify-center p-2 text-gray-500 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md lg:bg-white lg:dark:bg-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-700 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50">--}}
                        {{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"--}}
                        {{--                                         class="w-5 h-5">--}}
                        {{--                                        <path fill-rule="evenodd"--}}
                        {{--                                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"--}}
                        {{--                                              clip-rule="evenodd"></path>--}}
                        {{--                                    </svg></button>--}}
                        {{--                                <script>--}}
                        {{--                                    function switchTheme() {--}}
                        {{--                                        if (localStorage.theme === 'dark') {--}}
                        {{--                                            localStorage.theme = 'light'--}}
                        {{--                                        } else {--}}
                        {{--                                            localStorage.theme = 'dark'--}}
                        {{--                                        }--}}
                        {{--                                        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
                        {{--                                            document.documentElement.classList.add('dark')--}}
                        {{--                                        } else {--}}
                        {{--                                            document.documentElement.classList.remove('dark')--}}
                        {{--                                        }--}}
                        {{--                                    }--}}
                        {{--                                </script>--}}
                        {{--                            </div>--}}


                        {{--                        </div>--}}

                    </div>
                </div>
                <nav
                    {{--                    :class="{'block': open, 'hidden': !open}"--}}
                    class="flex-grow px-4 pb-4 md:pb-0 md:overflow-y-auto text-base text-gray-600 mt-1 pt-2 px-1 rounded-xl bg-white dark:bg-gray-700"
                    x-show="open"
                    x-transition:enter="transition ease-out origin-top duration-200"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition origin-top ease-in duration-100"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                >
                    <div class="mb-2">
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-red-100 {{ (request()->routeIs('admin.dashboard')) ? " bg-red-300 font-bold dark:text-gray-500 dark:bg-gray-100" : "bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">
							<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
								<path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
							</svg>
						</span>
                            <span class="ml-3 dark:text-white">Главная</span>
                        </a>
                    </div>

                    <div x-data="{ open: false }" class="mb-2">
                        <a role="button"
                           @click="$event.preventDefault(); open = !open"
                           aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                           class="flex flex-row items-center h-12 px-4 rounded-lg bg-gray-50 transition duration-150 text-gray-600 dark:bg-gray-700 dark:text-gray-400 hover:bg-indigo-200 dark:hover:text-gray-600 dark:hover:bg-indigo-400"
                           :class="{ 'bg-indigo-200 dark:bg-indigo-400 dark:text-gray-600': open }">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">
							<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
						</span>
                            <span class="ml-3 dark:text-white">Курсы</span>
                            <span aria-hidden="true" class="ml-auto">
                <!-- active class 'rotate-180' -->
                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </span>
                        </a>
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu">
                            <a href="#" role="menuitem"
                               class="block p-2 text-sm text-gray-400 transition-colors duration-200  rounded-md dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100">
                                Создать
                            </a>
                            <a href="#" role="menuitem"
                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100">
                                Редактировать
                            </a>
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="mb-2">
                        <a :class="{ 'bg-indigo-200 dark:bg-indigo-400 dark:text-gray-600': open }" role="button"
                           @click="$event.preventDefault(); open = !open"
                           aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                           class="flex flex-row items-center h-12 px-4 rounded-lg bg-gray-50 transition duration-150 text-gray-600 dark:bg-gray-700 dark:text-gray-400 hover:bg-indigo-200 dark:hover:text-gray-600 dark:hover:bg-indigo-400">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
						</span>
                            <span class="ml-3 dark:text-white">Студенты</span>
                            <span aria-hidden="true" class="ml-auto">
                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </span>
                        </a>
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu">
                            <a href="#" role="menuitem"
                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100">
                                Добавить
                            </a>
                            <a href="#" role="menuitem"
                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100">
                                Список
                            </a>
                        </div>
                    </div>
                    <div x-data="{ open: false }" class="mb-2">
                        <a :class="{ 'bg-indigo-200 dark:bg-indigo-400 dark:text-gray-600': open }" role="button"
                           @click="$event.preventDefault(); open = !open"
                           aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                           class="flex flex-row items-center h-12 px-4 rounded-lg transition duration-150 bg-gray-50 text-gray-600 dark:bg-gray-700 dark:text-gray-400 hover:bg-indigo-200 dark:hover:text-gray-600 dark:hover:bg-indigo-400">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                              <path
                                  d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
						</span>
                            <span class="ml-3 dark:text-white">Кураторы</span>
                            <span aria-hidden="true" class="ml-auto">
                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </span>
                        </a>
                        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu">
                            <a href="#" role="menuitem"
                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100">
                                Добавить
                            </a>
                            <a href="#" role="menuitem"
                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100">
                                Список
                            </a>
                        </div>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg transition duration-150 text-gray-600 bg-gray-50 hover:bg-red-200 dark:hover:text-gray-600 dark:hover:bg-red-400 {{ (request()->routeIs('admin.dashboard1')) ? "bg-red-200 font-bold dark:text-gray-500 dark:bg-gray-100" : "hover:bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
						</span>
                            <span class="ml-3 dark:text-white">Статистика</span>
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg transition duration-150 text-gray-600 bg-gray-50 hover:bg-red-200 dark:hover:text-gray-600 dark:hover:bg-red-400 {{ (request()->routeIs('admin.dashboard1')) ? "bg-indigo-400 font-bold dark:text-gray-500 dark:bg-gray-100" : "hover:bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
						</span>
                            <span class="ml-3 dark:text-white">Приглашение</span>
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg transition duration-150 text-gray-600 bg-gray-50 hover:bg-red-200 dark:hover:text-gray-600 dark:hover:bg-red-400 {{ (request()->routeIs('admin.dashboard1')) ? "bg-indigo-400 font-bold dark:text-gray-500 dark:bg-gray-100" : "hover:bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
</svg>
						</span>
                            <span class="ml-3 dark:text-white">Журнал</span>
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg transition duration-150 text-gray-600 bg-gray-50 hover:bg-red-200 dark:hover:text-gray-600 dark:hover:bg-red-400 {{ (request()->routeIs('admin.dashboard1')) ? "bg-indigo-400 font-bold dark:text-gray-500 dark:bg-gray-100" : "hover:bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">



                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
						</span>
                            <span class="ml-3 dark:text-white">Расписание</span>
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex flex-row items-center h-12 px-4 rounded-lg transition duration-150 text-gray-600 bg-gray-50 hover:bg-red-200 dark:hover:text-gray-600 dark:hover:bg-red-400 {{ (request()->routeIs('admin.dashboard1')) ? "bg-indigo-400 font-bold dark:text-gray-500 dark:bg-gray-100" : "hover:bg-gray-50 dark:bg-gray-700 hover:dark:bg-gray-800 dark:text-gray-400" }}">
						<span class="flex items-center justify-center text-lg text-gray-500 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
						</span>
                            <span class="ml-3 dark:text-white">Обратная связь</span>
                        </a>
                    </div>
                </nav>
                <div class=" px-3 mx-auto flex-center  bg-white">

                    {{--                        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">--}}
                    {{--                            <a href="#"--}}
                    {{--                               class="md:hidden text-xl font-mono tracking-wide text-gray-800 dark-mode:text-white focus:outline-none focus:shadow-outline dark:text-white">Название</a>--}}
                    {{--                            <div class="flex items-center">--}}
                    {{--                                <div class="md:hidden">--}}
                    {{--                                </div>--}}

                    {{--                            </div>--}}

                    {{--                        </div>--}}


                </div>
            </header>
            <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</main>


@stack('modals')
@livewireScripts


</body>
</html>
