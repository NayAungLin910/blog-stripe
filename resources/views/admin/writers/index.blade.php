<x-admin-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Writers') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-theme-blue-100">
                    <tr>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Bio</x-table.head>
                        <x-table.head class="text-center">Role</x-table.head>
                        <x-table.head class="text-center">Joined Date</x-table.head>
                        <x-table.head class="text-center">Action</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach($writers as $writer)
                        <tr>
                            <x-table.data>
                                <div>{{ $writer->name() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div>{{ $writer->emailAddress() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div @class([ 'px-2 py-1 text-center rounded text-gray-700' , 'bg-green-500'=>
                                    $writer->isAdmin() || $writer->isSuperAdmin(),
                                    'bg-blue-500' => $writer->isWriter(),
                                    ])
                                    >
                                    @if($writer->isAdmin() || $writer->isSuperAdmin())
                                        <span class="">Admin</span>
                                    @elseif($writer->isWriter())
                                        <span class="">Writer</span>
                                    @endif
                                </div>
                            </x-table.data>
                            <x-table.data>
                                <div class="text-center">
                                    {{ $writer->joinedDate() }}
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
                {{ $writers->render() }}
            </div>
        </div>
    </section>
</x-admin-layout>
