<article class="flex" data-aos="fade-up">
    <a href="{{ route('posts.show', $post) }}" class="post-image">
        <img class="object-cover w-full h-full" src="{{ $post->publicImageLink() }}" alt="{{ " The post
            titled, " . $post->title() . "'s image" }}">
    </a>
    <section class="relative flex-1">   
        <div class="mt-16 space-y-8">

            {{-- Tags --}}
            <div class="flex space-x-4">
                @foreach ($post->tags() as $tag)
                <a href="#" class="text-sm font-bold uppercase text-theme-blue-100">{{ $tag->name() }}</a>
                @endforeach

                @if ($post->isPremium())
                {{-- Premium Tag --}}
                <div class="absoluate top-0">
                    <h2 class="p-2 bg-gray-800 text-gray-200 uppercase">
                        Premium
                    </h2>
                </div>  
                @endif
                
            </div>

            {{-- Title --}}
            <h2 class="font-serif text-5xl font-bold">
                {{ $post->title() }}
            </h2>

            {{-- Excerpt --}}
            <p class="leading-6 tracking-wide text-gray-700">
                {{ $post->excerpt(300) }}
            </p>

        </div>

        {{-- Author --}}
        <div class="absolute flex justify-between w-full bottom-8">
            <div class="flex items-center space-x-4">
                <a href="#">
                    <img class="object-cover w-12 h-12 rounded" src="{{ $post->author()->getProfilePhotoUrlAttribute() }}"
            alt="The author, {{ $post->author()->name() }}'s image">
    </a>
    <div class="">
        <h3 class="text-xl font-bold">{{ $post->author()->name() }}</h3>
        <span class="text-sm text-gray-600">Food & Leisure</span>
    </div>
    </div>

    {{-- Button --}}
    <x-link.primary href="{{ route('posts.show', $post) }}">
        {{ __('Read More') }}
    </x-link.primary>

    </div>
    </section>
</article>