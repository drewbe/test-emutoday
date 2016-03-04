@extends('layouts.backend')

@section('title', 'Story')

@section('content')
    <a href="{{ route('backend.story.create') }}" class="btn btn-primary">Create New Story</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Author</th>
                <th>Published</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($storys as $story)
                <tr class="{{ $story->published_highlight }}">
                    <td>
                        <a href="{{ route('backend.story.edit', $story->id) }}">{{ $story->title }}</a>
                    </td>
                    <td>{{ $story->slug }}</td>
                    <td>{{ $story->author->name }}</td>
                    <td>{{ $story->published_date }}</td>
                    <td>
                        <a href="{{ route('backend.story.edit', $story->id) }}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('backend.story.confirm', $story->id) }}">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $storys->render() !!}
@endsection
