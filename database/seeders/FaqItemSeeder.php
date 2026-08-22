<?php


namespace Database\Seeders;

use App\Models\FaqItem;
use Illuminate\Database\Seeder;

class FaqItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'question' => 'Which studio is the right fit for my business?',
                'answer' => 'Most clients start with a free consultation where we map your goals against our four studios. Many businesses combine two or more, for example a Shopify store with AI video content driving traffic to it.',
                'category' => 'services',
                'sort_order' => 1,
            ],
            [
                'question' => 'How long does a typical project take?',
                'answer' => 'Shopify builds typically run four to six weeks, AI video and 3D animation projects one to three weeks depending on scope, and AI voice agents two to four weeks including training and testing.',
                'category' => 'services',
                'sort_order' => 2,
            ],
            [
                'question' => 'Do you work with businesses outside e-commerce?',
                'answer' => 'Yes. While Shopify and e-commerce is one of our core studios, our AI video, 3D animation and voice agent work supports service businesses, coaches, and product brands alike.',
                'category' => 'services',
                'sort_order' => 3,
            ],
            [
                'question' => 'How is a passive income system different from a regular project?',
                'answer' => 'A standard project is scoped, built and handed off. A passive income system is built to keep producing revenue after launch, and we stay engaged to monitor and tune performance monthly.',
                'category' => 'passive-income',
                'sort_order' => 1,
            ],
            [
                'question' => 'Do I need existing traffic or an audience to start?',
                'answer' => 'No. Several of our passive income tracks, including AI content engines and voice agent funnels, are designed to help generate traffic and leads from a standing start.',
                'category' => 'passive-income',
                'sort_order' => 2,
            ],
            [
                'question' => 'Can I update the system myself once it is live?',
                'answer' => 'Yes. Every system we build hands off through your admin panel, so you can update content, portfolio work and settings without waiting on a developer.',
                'category' => 'passive-income',
                'sort_order' => 3,
            ],
        ];

        foreach ($items as $item) {
            FaqItem::updateOrCreate(
                ['question' => $item['question']],
                $item
            );
        }
    }
}