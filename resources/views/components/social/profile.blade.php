{{-- Facebook --}}
@if (!empty($author->facebookProfile()))
<a href="{{ $author->facebookProfile() }}">
    <x-fab-facebook-f class="h-4 text-gray-800" />
</a>
@endif

{{-- Twitter --}}
@if (!empty($author->twitterProfile()))
<a href="{{ $author->twitterProfile() }}">
    <x-fab-twitter class="h-4 text-gray-800" />
</a>
@endif

{{-- Instagram --}}
@if (!empty($author->instagramProfile()))
<a href="{{ $author->instagramProfile() }}">
    <x-fab-instagram-square class="h-4 text-gray-800" />
</a>
@endif

{{-- LinkedIn --}}
@if (!empty($author->linkedInProfile()))
<a href="{{ $author->linkedInProfile() }}">
    <x-fab-linkedin-in class="h-4 text-gray-800" />
</a>
@endif