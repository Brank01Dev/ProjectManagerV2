@extends('layout')
@section('content')
@vite(['resources/scss/createproject.scss'])
<div class="row align-items-center">
    <div class="justify-content-between align-items-center margin-tb">
        <div class="pull-left">
            <h2>Add a project!</h2>
        </div>
        <div class="button-back">
            <a href="{{ route('Project.index') }}" class="btn-back">Back</a>
        </div>
    </div>
</div>
  
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!!!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('Project.store') }}" method="POST">
        {{ csrf_field() }}
  
        <div class="row">
            <div>

                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Project name">
                </div>

                <div class="form-group">
                    <strong>Descpription:</strong>
                    <input type="text" name="description" class="form-control" placeholder = "Project Descpription">
                </div>

                <div class="form-group">
                    <strong>Project creator name:</strong>
                    <input type="text" name="project_creator" class="form-control" placeholder="Enter ther name of project manager or creator">
                </div>

                <div class="form-group">
                    <strong>Project start date:</strong>
                    <input type="date" name="date_of_start" class="form-control" placeholder="Project starting date">
                </div>

                <div class="form-group">
                    <strong>Project start date:</strong>
                    <input type="date" name="date_of_end" class="form-control" placeholder="Project ending date">
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
@endsection