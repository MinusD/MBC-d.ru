<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"/>

<div class="bg-gradient-to-br from-indigo-900 to-green-900 min-h-screen overflow-auto">
    <div class="hidden sm:block sm:absolute right-3 bottom-1 font-semibold text-blue-400">For students by students
    </div>
    <div class="container max-w-5xl mx-auto px-4">

        <div class="w-4/5">
            <h1 class="mt-20 text-white text-6xl font-bold">Тут какой-то текст о том, для чего это сделано.
                <br/><span class="text-blue-400">MayBe Company</span></h1>
        </div>

{{--        <div class="my-10"></div>--}}
{{--        <div class="w-5/6 my-10 ml-6 z-20">--}}
{{--            <h3 class="text-gray-200 text-2xl">--}}
{{--                Проект на стадии празработки! По возникшем проблемам обращайтесь  <a href="{{ route('landing.contacts') }}" class="underline positive">по данным контактам.</a>--}}
{{--                --}}{{--                <span class="text-blue-500">For </span> students<span--}}
{{--                    class="text-blue-500"> by </span>students--}}
{{--                <br/>--}}
{{--            </h3>--}}
{{--        </div>--}}

        <div class="hidden sm:block opacity-50 z-0">
            <div class="shadow-2xl w-96 h-96 rounded-full -mt-72"></div>
            <div class="shadow-2xl w-96 h-96 rounded-full -mt-96"></div>
            <div class="shadow-xl w-80 h-80 rounded-full ml-8 -mt-96"></div>
        </div>

        <div class="text-white relative mt-2 md:mt-20">
            <h3 class="text-uppercase font-semibold">Страницы & Действия</h3>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 sm:gap-5 mb-12 ">
                <a href="{{ route('guest.schedule') }}">
                    <div
                        class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition mt-5 sm:mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        <div>
                            <span>Расписание</span>
                            <span class="text-xs text-blue-300 block">/schedule</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                    </div>
                </a>
                <a href="">

                    <div
                        class="relative group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition mt-5 sm:mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                        <div>
                            <span>Сервисы</span>
                            {{--                            <span class="text-xs text-blue-300 block">Тут интересно</span>--}}
                            <span class="text-xs text-blue-300 block">/services</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                        <div class="absolute text-xs text-gray-200 bottom-1 right-2">Не работает</div>
                    </div>
                </a>

                <a href="{{ route('landing.fastshare') }}">
                    <div
                        class="relative group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition mt-5 sm:mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                        <div>
                            <span>FastShare</span>
                            {{--                        <span class="text-xs text-blue-300 block">Разработчики и...</span>--}}
                            <span class="text-xs text-blue-300 block">/fs</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                        <div class="absolute text-xs text-gray-200 bottom-1 right-2">Не работает</div>
                    </div>

                </a>

                <a href="{{ route('login') }}">
                    <div
                        class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition mt-5 sm:mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 rotate-180" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <div>
                            <span>Войти</span>
                            {{--                            <span class="text-xs text-blue-300 block">Заходи быстрее</span>--}}
                            <span class="text-xs text-blue-300 block">/login</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition mt-5 sm:mt-2"></i>
                        </div>
                    </div>
                </a>
                <a href="{{ route('landing.contacts') }}">
                    <div
                        class="relative group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition mt-5 sm:mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <div>
                            <span>Контакты</span>
                            <span class="text-xs text-blue-300 block">/contacts</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                        <div class="absolute text-xs text-gray-200 bottom-1 right-2">Не работает</div>
                    </div>
                </a>
                <a href="{{ route('landing.about') }}">
                    <div
                        class="relative group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition mt-5 sm:mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <span>О Проекте</span>
                            {{--                            <span class="text-xs text-blue-300 block">Тут интересно</span>--}}
                            <span class="text-xs text-blue-300 block">/about</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                        <div class="absolute text-xs text-gray-200 bottom-1 right-2">Не работает</div>
                    </div>
                </a>
                <a href="{{ route('landing.team') }}">
                    <div
                        class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition mt-5 sm:mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <div>
                            <span>Команда</span>
                            {{--                        <span class="text-xs text-blue-300 block">Разработчики и...</span>--}}
                            <span class="text-xs text-blue-300 block">/team</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                    </div>
                </a>
                <a href="{{ route('landing.register') }}">
                    <div
                        class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition mt-5 sm:mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <div>
                            <span>Регистрация</span>
                            {{--                            <span class="text-xs text-blue-300 block">Заходи быстрее</span>--}}
                            <span class="text-xs text-blue-300 block">/register</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition mt-5 sm:mt-2"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
