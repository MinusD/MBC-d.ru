<div class="bg-gradient-to-br from-indigo-900 to-green-900 min-h-screen overflow-auto flex items-center justify-center">
    <style>
        html {
            scroll-behavior: smooth;
        }

        input {
            font-size: 45px;
            font-weight: bold;
            width: 165px;
            color: #e2e8f0;
            border: none;
            background: no-repeat bottom, 50% calc(100% - 1px);
            background-size: 0 100%, 100% 100%;
            background-image: linear-gradient(0deg, #f5af19 2px, rgba(156, 39, 176, 0) 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);

        }

        input:focus {
            background-size: 100% 100%, 100% 100%;
            transition-duration: .3s;
            box-shadow: none;
            outline: none;
        }

        input::placeholder {
            color: #cbd5e0;
        }


        /*html, body {*/
        /*    height: 100%;*/
        /*}*/

        /*body {*/
        /*    margin: 0;*/

        /*    background: #1a2a6c; !* fallback for old browsers *!*/
        /*    background: -webkit-linear-gradient(to right, #1a2a6c, #b21f1f, #fdbb2d); !* Chrome 10-25, Safari 5.1-6 *!*/
        /*    background: linear-gradient(to right, #1a2a6c, #b21f1f, #fdbb2d); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/


        /*    !*background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);*!*/


        /*    background-size: 400% 400%;*/
        /*    -webkit-animation: Gradient 20s ease infinite;*/
        /*    -moz-animation: Gradient 20s ease infinite;*/
        /*    animation: Gradient 20s ease infinite;*/

        /*}*/


    </style>
    @if($is_activate)
        <div class="w-2/6 bg-white rounded-lg shadow-sm p-8">
            <div class="flex justify-between items-center"><h1 class="font-extrabold tracking-wider">Быстрые ссылки</h1>
                <button class="hover:bg-blue-50 p-2 rounded-sm" wire:click="exit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col mt-5 gap-7 text-sm">
                <a href="https://disk.yandex.ru/i/r8C6duwDyPf6ZA">
                    <div class="bg-yellow-50 flex justify-between items-center p-3 rounded-sm shadow-sm">
                        <div class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <div><p class="text-gray-700 font-bold tracking-wider">Эссе по ВВПД (DOCX)</p>
                                <p class="text-gray-400 text-xs">disk.yandex.ru</p></div>
                        </div>
                    </div>
                </a>
                <a href="https://disk.yandex.ru/i/78GESM5A--UNpA">
                    <div class="bg-pink-50 flex justify-between items-center p-3 rounded-sm shadow-sm">
                        <div class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-500" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <div><p class="text-gray-700 font-bold tracking-wider">Эссе по ВВПД (PDF)</p>
                                <p class="text-gray-400 text-xs">disk.yandex.ru</p></div>
                        </div>
                        {{--                    <span class="font-bold text-pink-500">-27%</span>--}}
                    </div>
                </a>
                <a href="https://disk.yandex.ru/d/0LOhMLYY6rQLeg">
                    <div class="bg-green-50 flex justify-between items-center p-3 rounded-sm shadow-sm">
                        <div class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <div><p class="text-gray-700 font-bold tracking-wider">Папка разное</p>
                                <p class="text-gray-400 text-xs">disk.yandex.ru</p></div>
                        </div>
                    </div>
                </a>

                <a href="https://disk.yandex.ru/i/6gljRn8nkM3nJQ">
                    <div class="bg-indigo-50 flex justify-between items-center p-3 rounded-sm shadow-sm">
                        <div class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <div><p class="text-gray-700 font-bold tracking-wider">Удалено</p>
                                <p class="text-gray-400 text-xs">disk.yandex.ru</p></div>
                        </div>
                        {{--                    <span class="font-bold text-indigo-500">+8%</span></div>--}}
                    </div>
                </a>
            </div>
            @else
                <div class="flex">
                    <div class="grid grid-cols-1">
                        <label>
                            <input placeholder="" wire:model.defer="code" wire:change="auth"
                                   wire:keydown.enter="auth" maxlength="6"/>
                        </label>
                    </div>
                    {{--                <a href="#test" class="btn btn-block btn-warning">Go to form</a>--}}
                </div>
            @endif
        </div>
