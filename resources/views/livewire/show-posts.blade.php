<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-table>

        <div class="px-6 py-4 flex items-center">
            <x-input wire:model.live="search" class="flex-1 mr-4" placeholder="Busqueda por titulo o contenido"></x-input>

            @livewire('create-post')
        </div>

        @if ($posts->count())
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="w-24 cursor-pointer px-6 py-3" wire:click="order('id')">
                        ID
                        @if ($sort == 'id')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('title')">
                        TITLE
                        @if ($sort == 'title')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('content')">
                        CONTENT
                        @if ($sort == 'content')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        DATE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $post->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->title }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $post->content }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->created_at->diffForHumans()  }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No hay Registros que mostrar ...
            </div>
        @endif
    </x-table>

</div>
