@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h3 class="my-3">{{ $project->title }}</h3>
    <p>{{ $project->content }}</p>
</div>
@endsection
