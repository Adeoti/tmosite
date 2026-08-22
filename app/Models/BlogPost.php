<?php


namespace App\Models;

use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogPost extends Model
{
    use HasFactory, HasUniqueSlug;

    protected $fillable = [
        'blog_category_id',
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author_name',
        'status',
        'is_home_featured',
        'meta_title',
        'meta_description',
        'og_image',
        'canonical_url',
        'views_count',
        'reading_minutes',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_home_featured' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (BlogPost $post) {
            if ($post->isDirty('content')) {
                $post->reading_minutes = static::calculateReadingMinutes($post->content);
            }
        });
    }

    public static function calculateReadingMinutes(string $content): int
    {
        $wordCount = str_word_count(strip_tags($content));

        return max(1, (int) ceil($wordCount / 200));
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(function ($inner) {
                $inner->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function scopeHomeFeatured($query)
    {
        return $query->where('is_home_featured', true);
    }

    public function metaTitle(): string
    {
        return $this->meta_title ?: $this->title;
    }

    public function metaDescription(): string
    {
        return $this->meta_description ?: $this->excerpt ?: '';
    }

    public function metaImage(): string
    {
        if ($this->og_image) {
            return asset('storage/' . $this->og_image);
        }

        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }

        return asset('images/logo.png');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}