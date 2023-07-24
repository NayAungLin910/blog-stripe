<div>
    <div class="post-container">

        {{-- Latest Post --}}
        @foreach ($posts as $post)
        <x-posts.latest :post="$post" />
        @endforeach

    </div>
    <div class="flex justify-center my-16">
        @if ($posts->hasMorePages())
        <x-jet-button wire:click="loadMore">
            Load More
            <div wire:loading>
                ...
            </div>
        </x-jet-button>
        @else
        <h2 class="p-2 rounded font-bold text-white bg-theme-blue-100">No more posts...</h2>
        @endif
    </div>

</div>