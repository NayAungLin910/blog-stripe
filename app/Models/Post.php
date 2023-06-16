<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\TitleClass;
use Illuminate\Support\Str;
use App\Traits\HasAuthor;

class Post extends Model
{
    use HasFactory;
    use HasAuthor;

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
    ];

    // eager load the relationships
    protected $with = [
        'authorRelation'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'title' => TitleClass::class,
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
}
