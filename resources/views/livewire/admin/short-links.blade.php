<x-slot name="header">
    <span class="text-md md:text-2xl font-bold text-gray-900 dark:text-gray-100">
        Короткие ссылки
    </span>
</x-slot>
<div>
    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
{{--        <div class="flex items-center justify-between mb-3">--}}
{{--            <div class="flex items-center">--}}
{{--                <div class="flex flex-col">--}}
{{--                    <span class="font-bold text-2xl text-black dark:text-white ml-2">Участники группы</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <table class="min-w-max w-full table-auto  border-gray-200 my-1 dark:bg-gray-700 dark:border-gray-600">
            <thead class="">
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal rounded-t-full ">
                <th class="table-cell md:hidden py-3 px-6 text-left rounded-tl-md ">Название</th>
                <th class="hidden md:table-cell py-3 px-6 text-left rounded-tl-md">Название</th>
                <th class="hidden md:table-cell py-3 px-6 text-left">Ссылка</th>
                <th class="hidden md:table-cell py-3 px-6 text-center">Сокращение</th>
                <th class="hidden md:table-cell py-3 px-6 text-center">Счётчик</th>
                <th class="py-3 px-6 text-center rounded-tr-md">Действия</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light dark:text-gray-300">
            @forelse($data as $key => $link)
                <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-500 dark:hover:bg-gray-800 ">
{{--                    {{ $key%2 ? 'bg-gray-50 dark:bg-gray-800' : '' }}--}}
                    <td class="table-cell md:hidden py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $link->title }}</span>
                        </div>
                    </td>
                    <td class="hidden md:table-cell py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $link->title }}</span>
                        </div>
                    </td>
                    <td class="hidden md:table-cell py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span>{{ $link->full }}</span>
                        </div>
                    </td>
                    <td class="hidden md:table-cell py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <span>{{ $link->short }}</span>
                        </div>
                    </td>
                    <td class="hidden md:table-cell py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <span>{{ number_format($link->counter, 0, '', ' ') }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
{{--                                 wire:click="open_edit_student_modal({{$key}})"--}}
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </div>
                            <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                None Date
            @endforelse
            </tbody>
        </table>
        {{ $data->links() }}
    </div>

</div>
