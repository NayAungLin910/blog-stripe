<?php

namespace App\Jobs;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Services\SaveImageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTag implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name;
    public $image;
    public $description;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $name, ?string $image, string $description)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
    }

    public static function fromRequest(TagRequest $request): self
    {
        return new static(
            $request->name(),
            $request->image(),
            $request->description(),
        );
    }

    public function handle()
    {
        $tag = new Tag([
            'name' => $this->name,
            'slug' => '',
            'description' => $this->description,
        ]);

        SaveImageService::uploadImage($this->image, $tag, TAG::TABLE);

        return $tag;
    }
}
