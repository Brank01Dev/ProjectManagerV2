<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $Project = Project::where('user_id', Auth::id())
            ->latest()
            ->paginate(5);

        $projectData = $this->getProjectData();

        return view('dashboard', compact('Project', 'projectData'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'project_creator' => 'required',
            'date_of_start' => 'required',
            'date_of_end' => 'required',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'project_creator' => $request->project_creator,
            'date_of_start' => $request->date_of_start,
            'date_of_end' => $request->date_of_end,
            'status' => 'active',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('Project.index')
            ->with('success', 'Project created successfully!');
    }

    public function show(string $id)
    {
        $Project = Project::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('show', compact('Project'));
    }

    public function edit(string $id)
    {
        $Project = Project::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('editproject', compact('Project'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'project_creator' => 'required',
            'date_of_start' => 'required',
            'date_of_end' => 'required',
        ]);

        $Project = Project::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $Project->update([
            'name' => $request->name,
            'description' => $request->description,
            'project_creator' => $request->project_creator,
            'date_of_start' => $request->date_of_start,
            'date_of_end' => $request->date_of_end,
            'status' => $request->status ?? $Project->status,
        ]);

        return redirect()->route('Project.index')
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(string $id)
    {
        $Project = Project::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $Project->status = $Project->status === 'active' ? 'deleted' : 'active';
        $Project->save();

        return redirect()->route('Project.index')
            ->with('success', 'Project status updated successfully!');
    }

    public function forceDelete($id)
    {
        $Project = Project::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $Project->delete();

        return redirect()->route('Project.index')
            ->with('success', 'Project deleted permanently.');
    }

    private function getProjectData()
    {
        return Project::where('user_id', Auth::id())
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');
    }
}