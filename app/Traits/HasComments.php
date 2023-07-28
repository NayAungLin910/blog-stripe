<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    public function comments()
    {
        return $this->commentsRelation;
    }

    public function commentsRelation(): MorphMany
    {
        // please beware that the value assigned in id and type
        // might not be in the order
        return $this->morphMany(__FUNCTION__, 'commentable_type', 'commentable_id');
    }

    public function latestComments(int $amount = 5)
    {
        return $this->commentsRelation()->latest()->limit($amount)->get();
    }

    public function deleteComments()
    {
        foreach($this->commentsRelation()->get() as $comment) {
            $comment->delete();
        }

        $this->unsetRelation('commentsRelation');
    }
}
