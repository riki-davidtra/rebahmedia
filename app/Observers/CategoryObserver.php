<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Services\RichEditorFileCleanupService;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function __construct(
        protected RichEditorFileCleanupService $richEditorFilecleanupService
    ) {}

    public function creating(Category $category): void
    {
        $category->slug = $this->uniqueSlug($category->name);
    }

    public function updating(Category $category): void
    {
        if ($category->isDirty('name')) {
            $category->slug = $this->uniqueSlug($category->name, $category->id);
        }
    }

    protected function uniqueSlug($name, $ignoreId = null)
    {
        $slug     = Str::slug($name);
        $original = $slug;
        $count    = 1;

        $query = Category::where('slug', $slug);
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        while ($query->exists()) {
            $slug  = $original . '-' . $count++;
            $query = Category::where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }
        }

        return $slug;
    }
}
