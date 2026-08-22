<?php


namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Amara Okoye',
                'client_role' => 'Founder',
                'company' => 'Lumen Skincare',
                'content' => 'TMO Ultimate rebuilt our Shopify store and set up automated fulfillment. Orders now process themselves and our conversion rate is up noticeably.',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Daniel Reyes',
                'client_role' => 'Marketing Director',
                'company' => 'Northfield Realty',
                'content' => 'The AI voice agent now handles our first round of buyer calls and books qualified consultations straight into our calendar. It has freed up hours every week.',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Priya Shah',
                'client_role' => 'Co-Founder',
                'company' => 'Brightleaf Studio',
                'content' => 'Their 3D animation work gave our product launch a completely different level of polish. Communication was clear from the first call to final delivery.',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['client_name' => $testimonial['client_name'], 'company' => $testimonial['company']],
                $testimonial
            );
        }
    }
}