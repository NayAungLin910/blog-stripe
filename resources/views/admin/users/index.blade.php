<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-theme-blue-100">
                    <tr>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Bio</x-table.head>
                        <x-table.head>Subscription Name & Status</x-table.head>
                        <x-table.head class="text-center">Role</x-table.head>
                        <x-table.head class="text-center">Joined Date</x-table.head>
                        <x-table.head class="text-center">Action</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach($users as $user)
                        <tr>
                            <x-table.data>
                                <div>{{ $user->name() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div>{{ $user->emailAddress() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div>
                                    @foreach($user->subscriptions as $subscription)
                                        {{ ucfirst($subscription->name) }},
                                        {{ ucfirst($subscription->stripe_status) }}
                                    @endforeach
                                </div>
                            </x-table.data>
                            <x-table.data>
                                <div @class([ 'px-2 py-1 text-center rounded text-gray-700' , 'bg-green-500'=>
                                    $user->isAdmin() || $user->isSuperAdmin(),
                                    'bg-blue-500' => $user->isWriter(),
                                    'bg-red-500' => $user->isModerator(),
                                    'bg-gray-300' => $user->isDefault()
                                    ])
                                    >
                                    @if($user->isAdmin() || $user->isSuperAdmin())
                                        <span class="">Admin</span>
                                    @elseif($user->isWriter())
                                        <span class="">Writer</span>
                                    @elseif($user->isModerator())
                                        <span class="">Moderator</span>
                                    @elseif($user->isDefault())
                                        <span class="">Normal User</span>
                                    @endif
                                </div>
                            </x-table.data>
                            <x-table.data>
                                <div class="text-center">
                                    {{ $user->joinedDate() }}
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
                {{ $users->render() }}
            </div>
        </div>
    </section>
</x-app-layout>
