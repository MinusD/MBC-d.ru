<div>
    <style>
        html {
            overflow: hidden;
            overflow-x: hidden;
        }
    </style>
    <iframe src="{{ asset('/laraview/data/' . $path) }}" class="w-full h-screen"></iframe>
    <div><a href="{{ asset('/laraview/data/' . $path) }}" class="text-blue-600 -mt-72">Если учебник не отображается, перейдите
            по этой ссылки</a></div>
</div>
