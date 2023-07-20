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
            <x-form action="{{ route('admin.posts.store') }}" has-files>
                <div class="space-y-8">

                    {{-- Cover Image --}}
                    <div>
                        <x-form.label for="cover_image" value="{{ __('Cover Image') }}" />
                        <x-form.input name="cover_image" id="cover_image" class="block w-full mt-1" type="file"
                            required />
                        <x-form.error for="cover_image" />
                    </div>

                    {{-- Title --}}
                    <div>
                        <x-form.label for="title" value="{{ __('Title') }}" />
                        <x-form.input id="title" class="block w-full mt-1" type="text" name="title"
                            :value="old('title')" required autofocus />
                        <x-form.error for="title" />
                    </div>

                    {{-- Body --}}
                    <div>
                        <x-form.label for="body" value="{{ __('Content') }}" />
                        <x-trix name="body" />
                        <x-form.error for="body" />
                    </div>

                    {{-- Published At --}}
                    <div>
                        <x-form.label for="published_at" value="{{ __('Published At') }}" />
                        <x-pikaday name="published_at" />
                        <x-form.error for="published_at" />
                    </div>

                    {{-- Tags --}}
                    <div>
                        <x-form.label for="type" value="{{ __('Type') }}" />
                        <select name="type" id="type">
                            <option value="standard" selected>Standard</option>
                            <option value="preminum">Premium</option>
                        </select>
                    </div>

                    {{-- Photo Credit Text --}}
                    <div>
                        <x-form.label for="photo_credit_text"
                            value="{{ __('Photo Credit Text') }}" />
                        <x-form.input id="photo_credit_text" class="block w-full mt-1" type="text"
                            name="photo_credit_text" :value="old('photo_credit_text')" />
                        <x-form.error for="photo_credit_text" />
                    </div>

                    {{-- Photo Credit Link --}}
                    <div>
                        <x-form.label for="photo_credit_link"
                            value="{{ __('Photo Credit Link') }}" />
                        <x-form.input id="photo_credit_link" class="block w-full mt-1" type="text"
                            name="photo_credit_link" :value="old('photo_credit_link')" />
                        <x-form.error for="photo_credit_link" />
                    </div>

                    {{-- Allow Comments --}}
                    <div class="">
                        <x-form.label class="inline-block" for="is_commentable" value="{{ __('Allow Comments') }}" />
                        <x-checkbox name="is_commentable" id="is_commentable" />
                    </div>

                    {{-- Tags --}}
                    <div>
                        <x-form.label for="tags" value="{{ __('Tags') }}" />
                        <select name="tags[]" id="tags" multiple x-data="{}" x-init="function () { choices($el) }">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id() }}">{{ $tag->name() }}</option>
                            @endforeach
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
