<?php

namespace emutoday;

use Illuminate\Database\Eloquent\Model;
use emutoday\Story;

class StoryImage extends Model
{
    protected $fillable = ['story_id',
                            'is_active',
                            'is_featured',
                            'image_name',
                            'image_path',
                            'caption',
                            'teaser',
                            'moretext',
                            'image_extension'
    ];
    /**
        * All of the relationships to be touched.
        *
        * @var array
        */
       protected $touches = ['story'];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
