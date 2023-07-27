<div x-data="{ show: false }">
    <button class="text-sm font-semibold text-blue-500 uppercase" @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
        Reply
    </button>
    <div x-show="show">
        <x-form action="{{ route('replies.store') }}" class="space-y-4">
            <x-form.textarea name="body" class="" placeholder="Leave a reply here...">
                {{ old('body') }}
            </x-form.textarea>

            <input type="hidden" name="commentable_id" value="{{ $post->id() }}">
            <input type="hidden" name="commentable_type" value="posts">
            <input type="hidden" name="parent_id" value="{{ $comment->id() }}">
            <input type="hidden" name="depth" value="{{ $loop }}">
            <x-form.error for="body" />

            <x-buttons.default>
                Submit
            </x-buttons.default>
        </x-form>
    </div>
</div>
