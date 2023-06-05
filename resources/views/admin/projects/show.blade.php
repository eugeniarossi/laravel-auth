@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $project->title }}</h2>
    <p>{{ $project->content }}</p>
</div>
@endsection
