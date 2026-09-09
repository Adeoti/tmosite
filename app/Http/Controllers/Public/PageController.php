<?php


namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use App\Models\PortfolioCategory;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $team = TeamMember::active()->ordered()->get();

        return view('public.about', compact('team'));
    }

    public function services(): View
    {
        $categories = PortfolioCategory::active()->ordered()->get();
        $faqs = FaqItem::where('category', 'services')->ordered()->get();

        return view('public.services', compact('categories', 'faqs'));
    }

    public function passiveIncome(): View
    {
        $faqs = FaqItem::where('category', 'passive-income')->ordered()->get();

        return view('public.passive-income', compact('faqs'));
    }

    public function booking(): View
    {
        $services = PortfolioCategory::active()
            ->ordered()
            ->get();

        return view('public.booking', compact('services'));
    }

    public function bookingThankYou(): View
    {
        return view('public.booking-thank-you');
    }

    public function contact(): View
    {
        return view('public.contact');
    }

    public function privacy(): View
    {
        return view('public.privacy');
    }

    public function terms(): View
    {
        return view('public.terms');
    }

    public function annualReport(): View
    {
        $report = [
            'headline' => [
                'revenue' => 2305000,
                'projects' => 486,
                'clients' => 214,
                'growth' => 43.8,
                'margin' => 36.4,
                'markets' => 32,
                'rating' => 4.9,
            ],

            'quarterly' => [
                ['label' => 'Q1', 'value' => 415000],
                ['label' => 'Q2', 'value' => 514000],
                ['label' => 'Q3', 'value' => 614000],
                ['label' => 'Q4', 'value' => 762000],
            ],

            'services' => [
                ['name' => 'Animation', 'projects' => 132, 'revenue' => 645400, 'share' => 28, 'avg' => 4890, 'success' => 98.5, 'growth' => 41.2, 'rating' => 4.9],
                ['name' => 'Game Development', 'projects' => 62, 'revenue' => 461000, 'share' => 20, 'avg' => 7435, 'success' => 96.8, 'growth' => 58.4, 'rating' => 4.8],
                ['name' => 'Character Design', 'projects' => 88, 'revenue' => 276600, 'share' => 12, 'avg' => 3143, 'success' => 99.1, 'growth' => 26.7, 'rating' => 4.9],
                ['name' => '3D', 'projects' => 44, 'revenue' => 230500, 'share' => 10, 'avg' => 5239, 'success' => 97.4, 'growth' => 47.9, 'rating' => 4.8],
                ['name' => 'Collectibles', 'projects' => 52, 'revenue' => 184400, 'share' => 8, 'avg' => 3546, 'success' => 98.0, 'growth' => 18.3, 'rating' => 4.7],
                ['name' => 'Rigging', 'projects' => 41, 'revenue' => 161350, 'share' => 7, 'avg' => 3935, 'success' => 98.9, 'growth' => 52.6, 'rating' => 4.9],
                ['name' => 'Publishing', 'projects' => 27, 'revenue' => 138300, 'share' => 6, 'avg' => 5122, 'success' => 99.3, 'growth' => 21.4, 'rating' => 5.0],
                ['name' => 'Marketing', 'projects' => 26, 'revenue' => 115250, 'share' => 5, 'avg' => 4433, 'success' => 97.9, 'growth' => 33.1, 'rating' => 4.8],
                ['name' => 'Streaming', 'projects' => 9, 'revenue' => 57625, 'share' => 2.5, 'avg' => 6403, 'success' => 100, 'growth' => 29.8, 'rating' => 4.9],
                ['name' => 'Interactive Media', 'projects' => 5, 'revenue' => 34575, 'share' => 1.5, 'avg' => 6915, 'success' => 96.2, 'growth' => 64.5, 'rating' => 4.7],
            ],

            'channels' => [
                ['name' => 'Fiverr', 'revenue' => 553200, 'share' => 24, 'clients' => 62, 'cpa' => 96, 'aov' => 3820, 'roi' => 6.2],
                ['name' => 'Upwork', 'revenue' => 391850, 'share' => 17, 'clients' => 41, 'cpa' => 128, 'aov' => 5460, 'roi' => 5.4],
                ['name' => 'Repeat Clients', 'revenue' => 368800, 'share' => 16, 'clients' => 34, 'cpa' => 41, 'aov' => 8940, 'roi' => 14.8],
                ['name' => 'Referrals', 'revenue' => 276600, 'share' => 12, 'clients' => 28, 'cpa' => 58, 'aov' => 7420, 'roi' => 11.3],
                ['name' => 'Website Direct', 'revenue' => 230500, 'share' => 10, 'clients' => 19, 'cpa' => 142, 'aov' => 9180, 'roi' => 7.9],
                ['name' => 'Google Ads', 'revenue' => 161350, 'share' => 7, 'clients' => 12, 'cpa' => 268, 'aov' => 6240, 'roi' => 3.6],
                ['name' => 'Social Media Ads', 'revenue' => 138300, 'share' => 6, 'clients' => 10, 'cpa' => 214, 'aov' => 4980, 'roi' => 3.1],
                ['name' => 'LinkedIn', 'revenue' => 115250, 'share' => 5, 'clients' => 6, 'cpa' => 186, 'aov' => 11400, 'roi' => 4.8],
                ['name' => 'Email Marketing', 'revenue' => 69150, 'share' => 3, 'clients' => 2, 'cpa' => 72, 'aov' => 5760, 'roi' => 9.2],
            ],

            'financials' => [
                ['name' => 'Revenue', 'value' => 2305000, 'share' => 100],
                ['name' => 'Cost of Services', 'value' => -691500, 'share' => 30],
                ['name' => 'Gross Profit', 'value' => 1613500, 'share' => 70],
                ['name' => 'Operating Expenses', 'value' => -552000, 'share' => 23.9],
                ['name' => 'Operating Profit', 'value' => 1061500, 'share' => 46.1],
                ['name' => 'Taxes', 'value' => -222915, 'share' => 9.7],
                ['name' => 'Net Profit', 'value' => 838585, 'share' => 36.4],
            ],

            'regions' => [
                ['name' => 'United States', 'clients' => 78, 'share' => 39, 'revenue' => 899000],
                ['name' => 'United Kingdom', 'clients' => 29, 'share' => 14, 'revenue' => 323000],
                ['name' => 'Canada', 'clients' => 24, 'share' => 11, 'revenue' => 254000],
                ['name' => 'Australia', 'clients' => 16, 'share' => 8, 'revenue' => 184000],
                ['name' => 'Germany', 'clients' => 15, 'share' => 7, 'revenue' => 161000],
                ['name' => 'Japan', 'clients' => 13, 'share' => 6, 'revenue' => 138000],
                ['name' => 'France', 'clients' => 12, 'share' => 5, 'revenue' => 115000],
                ['name' => 'Netherlands', 'clients' => 9, 'share' => 4, 'revenue' => 92000],
                ['name' => 'Nigeria', 'clients' => 8, 'share' => 3, 'revenue' => 69000],
                ['name' => 'Others', 'clients' => 10, 'share' => 3, 'revenue' => 69000],
            ],

            'metrics' => [
                ['name' => 'Project Success Rate', 'value' => '98.4%'],
                ['name' => 'Revision Rate', 'value' => '6.2%'],
                ['name' => 'Refund Rate', 'value' => '0.4%'],
                ['name' => 'Average Delivery Time', 'value' => '7.8 days'],
                ['name' => 'Average Response Time', 'value' => '42 min'],
                ['name' => 'Lead Conversion', 'value' => '14.2%'],
                ['name' => 'Customer Retention', 'value' => '61.3%'],
                ['name' => 'Customer Satisfaction', 'value' => '98%'],
            ],

            'future' => [
                ['name' => 'Capacity', 'value' => '+60%'],
                ['name' => 'Team / Talent', 'value' => '18 → 30'],
                ['name' => 'AI Integration', 'value' => '−35% cycle time'],
                ['name' => 'Product / IP', 'value' => '2 original IPs'],
                ['name' => 'Revenue Pipeline', 'value' => '$1.1M'],
                ['name' => 'International Partnerships', 'value' => '3 regions'],
                ['name' => 'Revenue Target', 'value' => '+47.5% growth'],
            ],
        ];

        return view('public.annual-report', compact('report'));
    }
}
