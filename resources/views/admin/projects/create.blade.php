@extends('layouts.app')

@section('content')
<div class="container my-3">
    {{-- header --}}
    <h3>Create new Project</h3>

    {{-- validation errors --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>  
    @endif
    {{-- /validation errors --}}

    {{-- form --}}
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        {{-- title input --}}
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        {{-- /title input --}}
        {{-- content input --}}
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea type="form-control" class="form-control" id="content" name="content">{{ old('content') }}</textarea>
        </div>
        {{-- /content input --}}
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      {{-- /form --}}
</div>
@endsection
