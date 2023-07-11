<x-admin-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-theme-blue-100">
                    <tr>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Slug</x-table.head>
                        <x-table.head class="text-center">Created At</x-table.head>
                        <x-table.head class="text-center">Action</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach($tags as $tag)
                        <tr>
                            <x-table.data>
                                <div>{{ $tag->name() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div>{{ $tag->slug() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div class="text-center text-gray-700">
                                    {{ $tag->created_at }}
                                </div>
                            </x-table.data>
                            <x-table.data>
                                <div class="text-center">
                                    <div class="text-center">
                                        Ban, Delete
                                    </div>
                                </div>
                            </x-table.data>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-2 mt-6 bg-gray-200 rounded">
                {{ $tags->render() }}
            </div>
        </div>
    </section>
</x-admin-layout>
