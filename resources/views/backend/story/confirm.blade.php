@extends('layouts.backend')

@section('title', 'Delete '.$story->title)

@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['backend.story.destroy', $story->id]]) !!}
        <div class="alert alert-danger">
            <strong>Warning!</strong> You are about to delete a story. This action cannot be undone. Are you sure you want to continue?
        </div>

        {!! Form::submit('Yes, delete this story!', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('backend.story.index') }}" class="btn btn-success">
            <strong>No, get me out of here!</strong>
        </a>
    {!! Form::close() !!}
@endsection
