<?php

namespace emutoday\Http\Controllers\backend;

use emutoday\Story;

use Illuminate\Http\Request;
use emutoday\Http\Requests;


class StoryController extends Controller
{
    protected $storys;

    public function __construct(Story $storys)
    {
        $this->storys = $storys;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $storys = $this->storys->with('author')->orderBy('published_at', 'desc')->paginate(10);

        return view('backend.story.index', compact('storys'));
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Story $story)
    {
        return view('backend.story.form', compact('story'));
    }

    public function store(Requests\StoreStoryRequest $request)
    {
        $this->storys->create(
        ['author_id' => auth()->user()->id] + $request->only('title', 'slug', 'subtitle', 'published_at', 'teaser','body')
        );

        return redirect(route('backend.story.index'))->with('status', 'Story has been created.');
    }

    public function edit($id)
    {
        $story = $this->storys->findOrFail($id);

        return view('backend.story.form', compact('story'));

    }
    public function update(Requests\UpdateStoryRequest $request, $id)
    {
        $story = $this->storys->findOrFail($id);
        $story->fill($request->only('title', 'slug', 'subtitle', 'published_at', 'teaser','body'))->save();

        return redirect(route('backend.story.edit', $story->id))->with('status', 'Story has been updated.');
    }

    public function confirm($id)
    {
        $story = $this->storys->findOrFail($id);

        return view('backend.story.confirm', compact('story'));
    }

    public function destroy($id)
    {
        $story = $this->storys->findOrFail($id);
        $story->delete();

        return redirect(route('backend.story.index'))->with('status', 'Story has been deleted.');
    }

}
