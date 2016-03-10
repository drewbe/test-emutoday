@extends('layouts.backend')
@section('title', $storyImage->exists ? 'Editing '.$storyImage->image_name : 'No Image')


@section('content')

    <div>{{ $storyImage->image_name }} :  <br>

        <img src="/imgs/story/{{ $storyImage->image_name . '.' .
         $storyImage->image_extension . '?'. 'time='. time() }}">

    </div>

    <div>

       {{ $storyImage->image_name }} - thumbnail :  <br>

        <img src="/imgs/story/thumbnails/{{ 'thumb-' . $storyImage->image_name . '.' .
    $storyImage->image_extension . '?'. 'time='. time() }}">

    </div>


@endsection
