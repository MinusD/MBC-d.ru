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
    <wireui:scripts/>
    @livewireStyles


<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        #journal-scroll::-webkit-scrollbar {
            width: 4px;
            cursor: pointer;
            /*background-color: rgba(229, 231, 235, var(--bg-opacity));*/

        }
        #journal-scroll::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
            /*background: red;*/
        }
        #journal-scroll::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #a0aec0;
            /*outline: 1px solid slategrey;*/
        }
    </style>
    {{--    <script>--}}
    {{--        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
    {{--            document.documentElement.classList.add('dark')--}}
    {{--        } else {--}}
    {{--            document.documentElement.classList.remove('dark')--}}
    {{--        }--}}
    {{--    </script>--}}

</head>
<body class="font-sans antialiased">
<x-dialog z-index="z-50" blur="md" align="center"/>

<div class="font-sans text-gray-900 antialiased " >
    {{ $slot }}
</div>

@livewireScripts
@stack('modals')


</body>
</html>
