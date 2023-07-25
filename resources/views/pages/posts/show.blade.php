<x-guest-layout>
    <section class="container mx-auto">
        <div class="grid grid-cols-4 gap-10 pt-24">
            {{-- Single Post --}}
            <article class="col-span-3" data-aos="fade-up" data-aos-duration="500">

                {{-- Cover Image --}}
                <div class="h-96">
                    <img class="object-cover w-full h-full" src="{{ $post->publicImageLink() }}"
                        alt="{{ $post->title() }}">
                </div>

                {{-- Content --}}
                <div class="relative flex-1">
                    <div class="mt-16 space-y-8">

                        {{-- Tags --}}
                        <div class="flex space-x-2">
                            @foreach ($post->tags() as $tag)
                            <a href="#" class="text-sm font-bold uppercase text-theme-blue-100">{{ $tag->name() }}</a>
                            @endforeach
                        </div>

                        {{-- Title --}}
                        <h2 class="font-serif text-5xl font-bold">
                            {{ $post->title() }}
                        </h2>

                        {{-- Author --}}
                        <div class="flex items-center space-x-8">
                            <div class="flex items-center space-x-4">
                                <a href="#">
                                    <img class="object-cover w-12 h-12 rounded"
                                        src="{{ asset('img/authors/author-four.jpg') }}" alt="Author One">
                                </a>
                                <div class="">
                                    <h3 class="text-xl font-bold">{{ $post->author()->name() }}</h3>
                                </div>
                            </div>

                            {{-- Date --}}
                            <span class="text-gray-600">
                                Posted: {{ $post->pubishedAtDate() }}
                            </span>
                        </div>

                        {{-- Body --}}
                        <div class="leading-6 tracking-wide text-gray-700">
                            {!! $post->body() !!}
                        </div>

                    </div>
                </div>

                <hr class="pt-1 my-12 border-t border-b">

                <div class="flex flex-col items-center mb-24 space-y-4">
                    <h2 class="font-serif font-bold capitalize">Share this post</h2>
                    
                    {{-- Social Share --}}
                    <x-social.links :post="$post" url="{{ Request::url() }}" />

                </div>

                <div class="space-y-6">
                    <div class="border-b-2 border-theme-blue-100">
                        <h2 class="inline-block p-2 text-sm text-white uppercase rounded-t bg-theme-blue-100">
                            Post a comment
                        </h2>
                    </div>
                    <span class="block">10 Comments</span>

                    <div class="pb-16">
                        <x-form action="">
                            <x-textarea name="about"
                                class="w-full border-gray-200 rounded focus:border-theme-blue-100 focus:ring focus:ring-theme-blue-100 focus:ring-opacity-50">
                                Enter your comment
                            </x-textarea>
                        </x-form>
                    </div>
                </div>

            </article>

            {{-- Side nav --}}
            <x-sidenav.post />

        </div>
    </section>
</x-guest-layout>