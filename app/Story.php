<?php

namespace emutoday;

use Illuminate\Database\Eloquent\Model;
use emutoday\StoryImage;

class Story extends Model
{
    protected $table = 'storys';

    protected $fillable = ['author_id', 'title', 'slug','subtitle', 'teaser', 'body','published_at'];

    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: null;
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function storyImages()
    {
        return $this->hasMany(StoryImage::class);
    }
}
