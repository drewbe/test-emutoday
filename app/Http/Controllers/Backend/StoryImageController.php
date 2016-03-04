<?php

namespace emutoday\Http\Controllers\backend;

use Illuminate\Http\Request;

use emutoday\Http\Requests;
use emutoday\Http\Controllers\Controller;

class StoryImageController extends Controller
{



    public function index()
    {
        return 'Here is the index method';
    }
    
    public function create(StoryImage $storyImage)
    {
        return view('backend.storyiamges.create', compact('storyImage'));
    }

    public function store(StoryImage_StoreRequest $request)
    {
       //create new instance of model to save from form

       $storyImage = new StoryImage([
           'image_name'        => $request->get('image_name'),
           'image_extension'   => $request->file('image')->getClientOriginalExtension(),
           'mobile_image_name' => $request->get('mobile_image_name'),
           'mobile_extension'  => $request->file('mobile_image')->getClientOriginalExtension(),
           'is_active'         => $request->get('is_active'),
           'is_featured'       => $request->get('is_featured'),

       ]);

       //define the image paths

       $destinationFolder = '/imgs/story/';
       $destinationThumbnail = '/imgs/story/thumbnails/';
       $destinationMobile = '/imgs/story/mobile/';

       //assign the image paths to new model, so we can save them to DB

       $storyImage->image_path = $destinationFolder;
       $storyImage->mobile_image_path = $destinationMobile;

       // format checkbox values and save model

       $this->formatCheckboxValue($storyImage);
       $storyImage->save();

       //parts of the image we will need

       $file = Input::file('image');

       $imageName = $storyImage->image_name;
       $extension = $request->file('image')->getClientOriginalExtension();

       //create instance of image from temp upload

       $image = Image::make($file->getRealPath());

       //save image with thumbnail

       $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
           ->resize(60, 60)
           // ->greyscale()
           ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

       // now for mobile

       $mobileFile = Input::file('mobile_image');

       $mobileImageName = $storyImage->mobile_image_name;
       $mobileExtension = $request->file('mobile_image')->getClientOriginalExtension();

       //create instance of image from temp upload
       $mobileImage = Image::make($mobileFile->getRealPath());
       $mobileImage->save(public_path() . $destinationMobile . $mobileImageName . '.' . $mobileExtension);


       // Process the uploaded image, add $model->attribute and folder name

      // flash()->success('Story Image Created!');

       return redirect()->route('backend/storyimages.show', [$storyImage]);
    }

    public function formatCheckboxValue($storyImage)
    {

       $storyImage->is_active = ($storyImage->is_active == null) ? 0 : 1;
       $storyImage->is_featured = ($storyImage->is_featured == null) ? 0 : 1;
    }


}
