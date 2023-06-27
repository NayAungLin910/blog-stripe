<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\TitleCast;
use App\Contracts\CommentAble;
use Illuminate\Support\Str;
use App\Traits\HasAuthor;
use App\Traits\HasComments;
use App\Traits\HasTags;

class Post extends Model implements CommentAble
{
    use HasFactory;
    use HasAuthor;
    use HasTags;
    use HasComments;

    const TABLE = "posts";

    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'cover_image',
        'published_at',
        'type',
        'photo_credit_text',
        'photo_credit_link',
        'author_id',
        'is_commentable',
    ];

    // eager load the relationships
    protected $with = [
        'authorRelation',
        'commentsRelation',
        'tagsRelation',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'title' => TitleCast::class,
        'is_commentable' => 'boolean',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function coverImage(): string
    {
        return $this->cover_image;
    }

    public function delete()
    {
        $this->removeTags();
        parent::delete();
    }

    public function commentAbleTitle(): string
    {
        return $this->title();
    }
}
