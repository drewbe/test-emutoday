<?php

namespace emutoday;

use Illuminate\Database\Eloquent\Model;

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
                            'image_extension',
                            'mobile_image_name',
                            'mobile_image_path',
                            'mobile_extension'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
