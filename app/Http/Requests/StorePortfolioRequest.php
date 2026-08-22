<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'portfolio_category_id' => ['required', 'exists:portfolio_categories,id'],
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:220'],
            'client_name' => ['nullable', 'string', 'max:150'],
            'summary' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'gallery.*' => ['nullable', 'image', 'max:4096'],
            'remove_gallery' => ['nullable', 'array'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'project_url' => ['nullable', 'url', 'max:255'],
            'tags' => ['nullable', 'string'],
            'results' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'status' => ['required', 'in:draft,published'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}