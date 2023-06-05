@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista dei progetti</h2>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->title }}</td>
            <td>{{ $project->content }}</td>
            <td>{{ $project->slug }}</td>
            <td>
                <ul>
                    <li>
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-sm btn-primary">Show</a>
                    </li>
                    <li>
                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                    </li>
                    <li>
                        <a href="" class="btn btn-sm btn-primary">Delete</a>
                    </li>
                </ul>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>  
</div>
@endsection
