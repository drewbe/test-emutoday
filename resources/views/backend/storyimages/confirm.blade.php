@extends('layouts.backend')

@section('title', 'Delete '.$storyImage->image_name)

@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['backend.storyimages.destroy', $storyImage->id]]) !!}
        <div class="alert alert-danger">
            <strong>Warning!</strong> You are about to delete the Story Image Record. This action cannot be undone. Are you sure you want to continue?
        </div>

        {!! Form::submit('Yes, delete this record!', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('backend.storyimages.index') }}" class="btn btn-success">
            <strong>No, get me out of here!</strong>
        </a>
    {!! Form::close() !!}
@endsection
