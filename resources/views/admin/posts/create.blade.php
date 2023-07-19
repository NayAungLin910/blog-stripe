<x-admin-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/choices.css') }}" />
    @endpush

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Posts: Create') }}
        </h2>
    </x-slot>

    <section class="mx-6">
        <div class="p-8">
            <x-form action="#">
                <div class="space-y-8">
                    {{-- Name --}}
                    <div>
                        <x-form.label for="name" value="{{ __('Name') }}" />
                        <x-form.input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                            required autofocus />
                        <x-form.error for="name" />
                    </div>

                    {{-- Tags --}}
                    <div>
                        <x-form.label for="name" value="{{ __('Name') }}" />
                        <select name="tags[]" id="tags" multiple x-data="{}" x-init="function () { choices($el) }">
                            <option value=""></option>
                        </select>
                    </div>

                    {{-- Button --}}
                    <x-buttons.primary>
                        {{ __('Create') }}
                    </x-buttons.primary>
            </x-form>
        </div>
    </section>
</x-admin-layout>
