<div class="">
    <div class="flex items-center justify-center w-full h-screen">
        <div class="flex bg-red-300 h-32 w-32 md:bg-green-500 transition transform duration-500 rounded-md">
            <span class="hidden md:block">Размер >MD</span>
            <span class="block md:hidden">Размер меньше MD</span>
        </div>
    </div>
</div>


{{--<div class="container mx-auto space-y-4 p-4 sm:p-0">--}}
{{--    @php--}}
{{--    $date = strtotime('monday this week');--}}
{{--    for($i = 1;$i < 7;$i++) {?>--}}
{{--    <div class=""><?php echo date("d.m.Y", $date); ?></div>--}}
{{--    <?php--}}
{{--    $date =  strtotime('+1 day', $date);--}}
{{--    } @endphp--}}

{{--    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="travel" wire:model="types"/>--}}
{{--            <span>Travel</span>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="shopping" wire:model="types"/>--}}
{{--            <span>Shopping</span>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="food" wire:model="types"/>--}}
{{--            <span>Food</span>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="entertainment" wire:model="types"/>--}}
{{--            <span>Entertainment</span>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="other" wire:model="types"/>--}}
{{--            <span>Other</span>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">--}}
{{--        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">--}}
{{--            <livewire:livewire-column-chart--}}
{{--                key="{{ $columnChartModel->reactiveKey() }}"--}}
{{--                :column-chart-model="$columnChartModel"--}}
{{--            />--}}
{{--        </div>--}}
{{--        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">--}}
{{--            <livewire:livewire-pie-chart--}}
{{--                key="{{ $pieChartModel->reactiveKey() }}"--}}
{{--                :pie-chart-model="$pieChartModel"--}}
{{--            />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">--}}

{{--    <livewire:livewire-pie-chart--}}
{{--        key="{{ $ChartData1->reactiveKey() }}"--}}
{{--        :pie-chart-model="$ChartData1"--}}
{{--    />--}}

{{--    <livewire:livewire-column-chart--}}
{{--        :column-chart-model="$ChartData1"--}}
{{--    />--}}
{{--</div>--}}


{{--    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">--}}
{{--        <livewire:livewire-line-chart--}}
{{--            key="{{ $lineChartModel->reactiveKey() }}"--}}
{{--            :line-chart-model="$lineChartModel"--}}
{{--        />--}}
{{--    </div>--}}
{{--    <livewire:livewire-pie-chart--}}
{{--        key="{{ $pieChartModel->reactiveKey() }}"--}}
{{--        :pie-chart-model="$pieChartModel"--}}
{{--    />--}}
{{--    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">--}}
{{--        <livewire:livewire-area-chart--}}
{{--            key="{{ $areaChartModel->reactiveKey() }}"--}}
{{--            :area-chart-model="$areaChartModel"--}}
{{--        />--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="bg-gray-800 w-full h-screen p-10 gap-4">--}}
{{--    <x-button md positive class="m-4" wire:click="add">Назначить</x-button>--}}
{{--    {{ dd(\App\Models\Group::find(1)->users()->get()) }}--}}
{{--    {{ dd(Auth::user()->group()) }}--}}
{{--</div>--}}

{{--<div>--}}

{{--    <style>--}}
{{--        input {--}}
{{--            font-size:30px;--}}
{{--            font-weight: bold;--}}
{{--            width:110px;--}}
{{--            color: #e2e8f0;--}}
{{--            border: none;--}}
{{--            background: no-repeat bottom, 50% calc(100% - 1px);--}}
{{--            background-size: 0 100%, 100% 100%;--}}
{{--            background-image: linear-gradient(0deg, #f5af19 2px, rgba(156, 39, 176, 0) 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);--}}

{{--        }--}}

{{--        input:focus {--}}
{{--            background-size: 100% 100%, 100% 100%;--}}
{{--            transition-duration: .3s;--}}
{{--            box-shadow: none;--}}
{{--            outline: none;--}}
{{--        }--}}

{{--        input::placeholder {--}}
{{--            color: #cbd5e0;--}}
{{--        }--}}


{{--        html, body {--}}
{{--            height: 100%;--}}
{{--        }--}}

{{--        body {--}}
{{--            margin: 0;--}}

{{--            background: #1a2a6c; /* fallback for old browsers */--}}
{{--            background: -webkit-linear-gradient(to right, #1a2a6c, #b21f1f, #fdbb2d); /* Chrome 10-25, Safari 5.1-6 */--}}
{{--            background: linear-gradient(to right, #1a2a6c, #b21f1f, #fdbb2d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */--}}


{{--            /*background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);*/--}}


{{--            background-size: 400% 400%;--}}
{{--            -webkit-animation: Gradient 20s ease infinite;--}}
{{--            -moz-animation: Gradient 20s ease infinite;--}}
{{--            animation: Gradient 20s ease infinite;--}}
{{--            /*background: linear-gradient(-45deg, #2980B9, #6DD5FA, #FFFFFF);*/--}}
{{--            /*background-size: 400% 400%;*/--}}
{{--            /*animation: gradient 10s ease infinite;*/--}}
{{--        }--}}

{{--        @-webkit-keyframes Gradient {--}}
{{--            0% {--}}
{{--                background-position: 0% 50%--}}
{{--            }--}}
{{--            50% {--}}
{{--                background-position: 100% 50%--}}
{{--            }--}}
{{--            100% {--}}
{{--                background-position: 0% 50%--}}
{{--            }--}}
{{--        }--}}

{{--        @-moz-keyframes Gradient {--}}
{{--            0% {--}}
{{--                background-position: 0% 50%--}}
{{--            }--}}
{{--            50% {--}}
{{--                background-position: 100% 50%--}}
{{--            }--}}
{{--            100% {--}}
{{--                background-position: 0% 50%--}}
{{--            }--}}
{{--        }--}}

{{--        @keyframes Gradient {--}}
{{--            0% {--}}
{{--                background-position: 0% 50%--}}
{{--            }--}}
{{--            50% {--}}
{{--                background-position: 100% 50%--}}
{{--            }--}}
{{--            100% {--}}
{{--                background-position: 0% 50%--}}
{{--            }--}}
{{--        }--}}

{{--        /*@keyframes gradient {*/--}}
{{--        /*    0% {*/--}}
{{--        /*        background-position: 0 50%;*/--}}
{{--        /*    }*/--}}
{{--        /*    50% {*/--}}
{{--        /*        background-position: 100% 50%;*/--}}
{{--        /*    }*/--}}
{{--        /*    100% {*/--}}
{{--        /*        background-position: 0 50%;*/--}}
{{--        /*    }*/--}}
{{--        /*}*/--}}
{{--    </style>--}}
{{--    <div class="flex items-center justify-center h-screen w-full">--}}
{{--        <div class="flex">--}}
{{--            <input placeholder="FS code" wire:model="fs_code" wire:keydown.enter="go"/>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
