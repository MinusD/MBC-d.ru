<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Заявки в группу
    </span>
</x-slot>

<div>
    <table class="min-w-max w-full table-auto  border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-600">
        <thead class="">
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal rounded-t-full ">
            <th class="table-cell md:hidden py-3 px-6 text-left rounded-tl-md ">ФИО</th>
            <th class="hidden md:table-cell py-3 px-6 text-left rounded-tl-md">Фамилия</th>
            <th class="hidden md:table-cell py-3 px-6 text-left">Имя</th>
            <th class="hidden md:table-cell py-3 px-6 text-center">Отчество</th>
            {{--                        <th class="py-3 px-6 text-center">Status</th>--}}
            <th class="py-3 px-6 text-center rounded-tr-md">Действия</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light dark:text-gray-300">
        @forelse($applications as $key => $student)
            <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-500 dark:hover:bg-gray-800 {{ $key%2 ? 'bg-gray-50 dark:bg-gray-800' : '' }}">
                <td class="table-cell md:hidden py-3 px-6 text-left">
                    <div class="flex items-center">
                                    <span
                                        class="font-medium">{{ $student['sname'] . " " . mb_substr($student['name'], 0, 1) . ". " .  mb_substr($student['pname'], 0, 1) . "."  }} </span>
                    </div>
                </td>
                <td class="hidden md:table-cell py-3 px-6 text-left">
                    <div class="flex items-center">
                        <span class="font-medium">{{ $student['sname'] }} </span>
                    </div>
                </td>
                <td class="hidden md:table-cell py-3 px-6 text-left">
                    <div class="flex items-center">
                        <span>{{ $student['name'] }}</span>
                    </div>
                </td>
                <td class="hidden md:table-cell py-3 px-6 text-center">
                    <div class="flex item-center justify-center">
                        <span>{{ $student['pname'] }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center gap-x-2"
                         x-data="{ title: 'Вы уверены что хотите добавить сттудента в группу?' }">
                        @if($student['status'] == 'wait')
                            <x-button sm positive x-on:confirm="{
            title: 'Вы уверены что хотите добавить студента в группу?',
            description: 'В случае ошибки, третье лицо может получить конфиденциальные данные.',
            icon: 'success',
            accept: {
                label: 'Принять',
                method: 'accept',
                params: {{ $student['inv_id'] }}
                                },
                                reject: {
                                    label: 'Отмена',
                                } }">Принять
                            </x-button>
                            <x-button sm negative x-on:confirm="{
            title: 'Вы уверены что хотите отклонить запрос студента в группу?',
            description: 'В случае ошибки, у пользователя могут возникнуть проблемы с повторной заявкой.',
            icon: 'warning',
            accept: {
                label: 'Отклонить',
                method: 'refused',
                params: {{ $student['inv_id'] }}
                                },
                                reject: {
                                    label: 'Отмена',
                                } }">Отклонить
                            </x-button>
                        @elseif($student['status'] == 'accepted')
                            <x-button positive outline disabled>Принято {{ $student['updated_at'] }}</x-button>
                        @else
                            <x-button negative outline disabled>Отклонено {{ $student['updated_at'] }}</x-button>
                        @endif
                    </div>
                </td>
            </tr>
        @empty
            None Data
        @endforelse
        </tbody>
    </table>
</div>
