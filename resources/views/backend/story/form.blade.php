@extends('layouts.backend')

@section('title', $story->exists ? 'Editing '.$story->title : 'Create New Story')

@section('content')
    {!! Form::model($story, [
        'method' => $story->exists ? 'put' : 'post',
        'route' => $story->exists ? ['backend.story.update', $story->id] : ['backend.story.store']
    ]) !!}

    <div class="form-group">
        {!! Form::label('title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('subtitle') !!}
        {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            {!! Form::label('published_at') !!}
        </div>
        <div class="col-md-4">
            {!! Form::text('published_at', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group teaser">
        {!! Form::label('teaser') !!}
        {!! Form::textarea('teaser', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    <div>
        <table class="table">
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
            {{ $storyImages = $story->storyImages }}
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
    </div>



    {!! Form::submit($story->exists ? 'Save Story' : 'Create New Story', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    <script>
        new SimpleMDE({
            element: document.getElementsByName('teaser')[0]
        }).render();

        new SimpleMDE({
            element: document.getElementsByName('body')[0]
        }).render();

        $('input[name=published_at]').datetimepicker({
            allowInputToggle: true,
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true,
            defaultDate: '{{ old('published_at', $story->published_at) }}'
        });

        $('input[name=title]').on('blur', function () {
            var slugElement = $('input[name=slug]');

            if (slugElement.val()) {
                return;
            }

            slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
        });
    </script>
@endsection
