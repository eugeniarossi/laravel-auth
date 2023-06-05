@extends('layouts.app')

@section('content')
<div class="container my-3">

    <div class="d-flex justify-content-between align-items-center my-4">
        <h2>Projects list</h2>
        {{-- create project --}}
        <a href="{{ route('admin.projects.create') }}" class="btn btn-md btn-info">Create new Project</a>
    </div>

    {{-- message - project created --}}
    @if (session('message'))
      <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            {{ session('message') }}
          </div>
        </div>
      </div>
    @endif
    {{-- /message - project created --}}

    {{-- table --}}
    <table class="table">
        {{-- table head --}}
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        {{-- /table head --}}
        <tbody>
            {{-- element to repeat --}}
            @foreach ($projects as $project)
            <tr>
            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->title }}</td>
            <td>{{ $project->content }}</td>
            <td>{{ $project->slug }}</td>
            {{-- actions --}}
            <td>
                <ul class="list-unstyled">
                    {{-- show --}}
                    <li>
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-primary my-1">Show</a>
                    </li>
                    {{-- edit --}}
                    <li>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning my-1">Edit</a>
                    </li>
                    {{-- delete --}}
                    <li>
                        {{-- button trigger delete modal --}}
                        <a href="#" class="btn btn-sm btn-danger my-1" data-bs-toggle="modal" data-bs-target="#project-{{ $project->id }}">Delete</a>
                    </li>
                </ul>
            </td>
            {{-- /actions --}}
            </tr>

            {{-- modal --}}
            <div class="modal fade" id="project-{{ $project->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete project <strong>{{ $project->title }}</strong>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger my-1">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            {{-- /modal --}}
            @endforeach
            {{-- element to repeat --}}
        </tbody>
    </table>  
    {{-- /table --}}
</div>
@endsection
