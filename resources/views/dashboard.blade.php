@extends('layout') 
@vite(['resources/scss/dashboard.scss', 'resources/js/app.js'])

@section('content')
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div class="">
                <h2>Project Manager</h2>
            </div>
            
            <div class="flex gap-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md">
                        Log out
                    </button>
                </form>
                
                <a class="btn btn-success px-4 py-2 bg-green-600 text-white rounded-md" href="{{ route('profile.edit') }}">
                    Edit profile
                </a>

                <a class="btn btn-success px-4 py-2 bg-green-600 text-white rounded-md"" href="{{ route('Project.create') }}">
                    Add a project!
                </a>
            </div>
        </div>
    </div> 
    @if($message = Session::get('success'))
        <div class="alert alert-success mb-4">
            <p>{{ $message }}</p>
        </div>
    @endif 
<div class="mainpage">
    <table class="board">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Creator Name</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th style="width:280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Project as $project)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $project->name }}</td>
                    <td>
                        @if ($project->status === 'active')
                            {{ $project->description }}
                        @else
                            <del>{{ $project->description }}</del>
                        @endif
                    </td>
                    <td>
                        @if ($project->status === 'deleted')
                            <span style="color: red">Deleted</span>
                        @else
                            Active
                        @endif
                    </td>
                    <td>{{ $project->project_creator }}</td>
                    <td>{{ $project->date_of_start }}</td>
                    <td>{{ $project->date_of_end }}</td>
                    <td>
                        <form action="{{ route('Project.destroy', $project->id) }}" method="POST" >
                            <a class="btn btn-info px-2 py-1 bg-blue-600 text-white rounded-md" href="{{ route('Project.show', $project->id) }}">Show</a>
                            <a class="btn btn-primary px-2 py-1 bg-indigo-600 text-white rounded-md" href="{{ route('Project.edit', $project->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-2 py-1 bg-red-600 text-white rounded-md">Edit Status</button>
                        </form>
                        <form action="{{ route('Project.forceDelete', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this project?')" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-2 py-1 bg-red-700 text-white rounded-md">
                                Delete Permanently
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table> 


    <div class="chart-container">
        
    <canvas id="projectChart"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const projectData = @json($projectData);
    
        const ctx = document.getElementById('projectChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(projectData),
                datasets: [{
                    label: 'Projects by Status',
                    data: Object.values(projectData),
                    backgroundColor: ['#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384', '#9966FF'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                    title: { display: true, text: 'Projects by Status' }
                }
            }
        });
    </script>
    </div>
</div>
@endsection