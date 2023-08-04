<x-jet-form-section submit="updateSocialProfileLinks">
    <x-slot name="title">
        {{ __('Update Social Profile Links') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update social links for viewers to easily find you.') }}
    </x-slot>

    <x-slot name="form">

        {{-- Facebook --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="facebook" value="{{ __('Facebook') }}" />
            <x-jet-input id="facebook" type="text" class="mt-1 block w-full" wire:model.defer="profile.facebook" />
            <x-jet-input-error for="facebook" class="mt-2" />
        </div>

        {{-- Twitter --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="twitter" value="{{ __('Twitter') }}" />
            <x-jet-input id="twitter" type="text" class="mt-1 block w-full" wire:model.defer="profile.twitter" />
            <x-jet-input-error for="twitter" class="mt-2" />
        </div>

        {{-- Instagram --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="instagram" value="{{ __('Instagram') }}" />
            <x-jet-input id="instagram" type="text" class="mt-1 block w-full" wire:model.defer="profile.instagram" />
            <x-jet-input-error for="instagram" class="mt-2" />
        </div>

        {{-- LinkedIn --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="linkedin" value="{{ __('LinkedIn') }}" />
            <x-jet-input id="linkedin" type="text" class="mt-1 block w-full" wire:model.defer="profile.linkedin" />
            <x-jet-input-error for="linkedin" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="updated">
            {{ __('Updated social links!') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>