<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-table>

        <div class="px-6 py-4">
            <x-input wire:model.live="search" class="w-full" placeholder="Busqueda por titulo o contenido"></x-input>
        </div>

        @if ($posts->count())
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('id')">
                        ID
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('title')">
                        TITLE
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('content')">
                        CONTENT
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
