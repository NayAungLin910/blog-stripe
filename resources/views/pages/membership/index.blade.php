<x-guest-layout>

    <section class="container pt-16 mx-auto mb-32">

        {{-- Header --}}
        <header class="flex flex-col py-8 mt-8 mb-12 space-y-6 text-center">
            <h2 class="font-serif text-5xl font-bold">Membership</h2>
            <hr class="self-center w-40 border-b-4 border-theme-blue-200">
        </header>

        {{-- Alert Message --}}
        <x-alerts.main />

        <div class="grid grid-cols-3 gap-8 my-16">

            {{-- Free Plan --}}
            <div class="border border-gray-200 divide-y divide-gray-200 shadow-lg bg-gray-50">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold leading-6 text-gray-900">Free</h2>
                    <p class="mt-4 text-sm leading-normal">Awesome packages</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold">$0.00</span>
                    </p>

                </div>
                <div class="px-6 pt-6 pb-8">
                    <h3 class="text-xs font-semibold tracking-wide uppercase">What's included
                    </h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Some huge benefit
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Crazy offer
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Used Laravel 8 to make this
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Tailwind is awesome
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                AOS js library for some extra effects
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            @foreach($plans as $plan)
            <div class="border border-gray-200 divide-y divide-gray-200 shadow-lg bg-gray-50">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold leading-6 text-gray-900">{{ $plan->name() }}</h2>
                    <p class="mt-4 text-sm leading-normal">Awesome packages</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold">{{ $plan->price() }}</span>
                        <span class="text-base font-medium text-gray-500">{{ $plan->abbreviation() }}</span>
                    </p>

                    @subscribedToProduct($user, $plan->stripeProductId(), $plan->stripeName())

                    {{-- Trial Message --}}
                    @onTrial($user, $plan->stripeName())

                    <h2 class="text-blue-600 font-bold mb-3">
                        You are trial will end on {{ $user->trialEndsAt($plan->stripeName())->format('d F Y') }}!
                    </h2>

                    @else

                    {{-- Subscription Message --}}
                    <h2 class="text-blue-600 font-bold mb-3">You are currently subscribed to this plan!</h2>

                    {{-- On Grace Period --}}
                    @onGracePeriod($plan->stripeName())

                    <h2 class="text-yellow-600 font-bold mb-3">
                        Your subscription will end on
                        {{ $user->subscription($plan->stripeName())->ends_at->format('d F Y') }}
                    </h2>

                    {{-- Resume Button --}}
                    <a href="{{ route('subscriptions.update', $plan->stripeName()) }}"
                        class="transition-all duration-150 text-white bg-green-600 hover:bg-green-500 p-2 shadow rounded-md">
                        Resume Subscription
                    </a>

                    @else

                    {{-- Cancel Button --}}
                    <a href="{{ route('subscriptions.destroy', $plan->stripeName()) }}"
                        class="transition-all duration-150 text-white bg-red-600 hover:bg-red-500 p-2 shadow rounded-md">
                        Cancel Subscription
                    </a>

                    @endonGracePeriod

                    @endonTrial()

                    @else
                    
                    <x-link.primary href="{{ route('payments', ['plan' => $plan->stripeName()]) }}">
                        Sign Up
                    </x-link.primary>

                    @endsubscribedToProduct

                </div>
                <div class="px-6 pt-6 pb-8">
                    <h3 class="text-xs font-semibold tracking-wide uppercase">What's included
                    </h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Some huge benefit
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Crazy offer
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Used Laravel 8 to make this
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Tailwind is awesome
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                AOS js library for some extra effects
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
    </section>
</x-guest-layout>