<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqItemController extends Controller
{
    public function index(): View
    {
        $faqItems = FaqItem::ordered()->paginate(15);

        return view('admin.faq-items.index', compact('faqItems'));
    }

    public function create(): View
    {
        return view('admin.faq-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:1000'],
            'category' => ['required', 'in:general,services,passive-income'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        FaqItem::create($data);

        return redirect()->route('admin.faq-items.index')->with('status', 'FAQ added.');
    }

    public function edit(FaqItem $faqItem): View
    {
        return view('admin.faq-items.edit', compact('faqItem'));
    }

    public function update(Request $request, FaqItem $faqItem): RedirectResponse
    {
        $data = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:1000'],
            'category' => ['required', 'in:general,services,passive-income'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $faqItem->update($data);

        return redirect()->route('admin.faq-items.index')->with('status', 'FAQ updated.');
    }

    public function destroy(FaqItem $faqItem): RedirectResponse
    {
        $faqItem->delete();

        return redirect()->route('admin.faq-items.index')->with('status', 'FAQ deleted.');
    }
}