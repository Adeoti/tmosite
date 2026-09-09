<?php


namespace Database\Seeders;

use App\Models\PortfolioCategory;
use Illuminate\Database\Seeder;

class PortfolioCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Shopify & E-commerce',
                'slug' => 'shopify-ecommerce',
                'icon' => 'shopping-bag',
                'description' => 'Conversion-focused Shopify builds and full e-commerce ecosystems.',
                'sort_order' => 1,
            ],
            [
                'name' => 'AI Video Production',
                'slug' => 'ai-video-production',
                'icon' => 'video',
                'description' => 'AI-generated and AI-enhanced video content for brands and campaigns.',
                'sort_order' => 2,
            ],
            [
                'name' => '3D Video & Animation',
                'slug' => '3d-video-animation',
                'icon' => 'box',
                'description' => 'Cinematic 3D renders, product animation and motion design.',
                'sort_order' => 3,
            ],
            [
                'name' => 'AI Voice Agents',
                'slug' => 'ai-voice-agents',
                'icon' => 'mic',
                'description' => 'Conversational AI voice agents for sales, support and booking.',
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            PortfolioCategory::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}