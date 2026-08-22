<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $teamMembers = TeamMember::ordered()->paginate(12);

        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create(): View
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->storeUpload($request->file('photo'), 'team');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member added.');
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->replaceUpload($teamMember->photo, $request->file('photo'), 'team');
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member updated.');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $this->deleteUpload($teamMember->photo);
        $teamMember->delete();

        return redirect()->route('admin.team-members.index')->with('status', 'Team member removed.');
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'role' => ['required', 'string', 'max:150'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $data['is_active'] = $request->boolean('is_active');
        $data['social_links'] = array_filter([
            'linkedin' => $data['linkedin_url'] ?? null,
            'twitter' => $data['twitter_url'] ?? null,
        ]);

        unset($data['photo'], $data['linkedin_url'], $data['twitter_url']);

        return $data;
    }
}