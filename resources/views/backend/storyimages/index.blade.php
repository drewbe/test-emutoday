@extends('layouts.backend')

@section('title', 'Story Images')

    @section('content')
        <a href="{{ route('backend.storyimages.create') }}" class="btn btn-primary">Create New Story Image</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Story Image ID</th>
                <th>Story Image Thumbnail</th>
                <th>Story Image Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($storyImages as $storyImage)
                <tr>
                    <td>
                        <a href="{{ route('backend.storyimages.show', $storyImage->id) }}">{{ $storyImage->id }}</a>
                    </td>
                    <td>
                        <img src="{{ $storyImage->image_path . 'thumbnails/' . 'thumb-' . $storyImage->image_name . '.' .
                    $storyImage->image_extension . '?'. 'time='. time() }}">
                    </td>
                    <td>{{ $storyImage->image_name }}</td>
                    <td>
                        <a href="{{ route('backend.storyimages.edit', $storyImage->id) }}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('backend.storyimages.confirm', $storyImage->id) }}">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $storyImages->render() !!}

    @endsection
