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
        $Project = Project::find($id);
    
        return view('show', compact('Project'));
    
    }


    public function edit(string $id)
    {
        $Project = Project::find($id);
    
        return view('editproject', compact('Project', 'id'));
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
  
  
        $Project = Project::find($id);
        $Project->name = request('name');
        $Project->description = request('description');
        $Project->project_creator = request('project_creator');
        $Project->date_of_start = request('date_of_start');
        $Project->date_of_end = request('date_of_end');
        $Project->status = request('status');
        $Project->save();
  
         
        $Project = Project::latest()->paginate(5);
$projectData = $this->getProjectData();

return view('dashboard', compact('Project', 'projectData'))
       ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function destroy(string $id)
    {
        $Project = Project::find($id);
        if($Project->status === 'active'){
            $Project->status = 'deleted';
        }else{
            $Project->status = 'active';
        }
        $Project->save();
  
         
        $Project = Project::latest()->paginate(5);
$projectData = $this->getProjectData();

return view('dashboard', compact('Project', 'projectData'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function forceDelete($id)
{
    $project = Project::findOrFail($id);
    $project->delete(); 

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