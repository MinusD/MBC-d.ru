<div class="bg-gradient-to-br from-indigo-900 to-green-900 min-h-screen overflow-auto flex items-center justify-center">
    <div class="w-full md:w-1/3 xl:w-1/5 bg-gray-50 p-6 rounded-md gap-x-3">
        <h1>Введите переменные <small>Практическая #9</small> </h1>
        <x-input wire:model.defer="input1" label="F1" class="mb-2"></x-input>
        <x-input wire:model.defer="input2" label="F2" class="mb-2"></x-input>
        <x-input wire:model.defer="input3" label="F3" class="mb-2"></x-input>
        <x-input wire:model.defer="input4" label="F4" class="mb-2"></x-input>
        <x-button primary label="Продолжить" wire:click="go"></x-button>
        <span class="text-sm mt-2">P.s. Сделано быстро, поэтому валидатора нету, если увидите код, значит вы накасячили с данными, обновите страницу и попробуйте снова</span>
    </div>
    @if(true)
        <div class=" m-20">
            <table class="border-collapse w-full rounded-md">
                <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        №
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        a
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        b
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        c
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        d
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        F1
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        F2
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        F3
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        F4
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        N
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($data2 as $key => $item)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        @foreach($item as $key2 => $el)
                            <td class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b block lg:table-cell relative lg:static" @if($key2 > 4) style="background-color: {{$colors[$key]}}" @endif>
                                {{ $el }}
                            </td>
                        @endforeach
                    </tr>
                @empty
                    Введите функцию
                @endforelse
                </tbody>
            </table>

        </div>
    @endif
    {{--    <div class="w-1/5 bg-gray-50 p-6 rounded-md">--}}
    {{--        <h1>Введите переменные</h1>--}}
    {{--        <x-input wire:model="input1" label="F1"></x-input>--}}
    {{--        <x-input wire:model="input2" label="F2"></x-input>--}}
    {{--        <x-input wire:model="input3" label="F3"></x-input>--}}
    {{--        <x-input wire:model="input4" label="F4"></x-input>--}}
    {{--    </div>--}}


    {{-- The Master doesn't talk, he acts. --}}
</div>
