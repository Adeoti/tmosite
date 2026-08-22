<?php


namespace App\Models;

use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory, HasUniqueSlug;

    protected $fillable = [
        'portfolio_category_id',
        'title',
        'slug',
        'client_name',
        'summary',
        'description',
        'cover_image',
        'gallery',
        'video_url',
        'project_url',
        'tags',
        'results',
        'is_featured',
        'status',
        'sort_order',
        'published_at',
    ];

    protected $casts = [
        'gallery' => 'array',
        'tags' => 'array',
        'results' => 'array',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(function ($inner) {
                $inner->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('published_at');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}