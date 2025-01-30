<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'background_image', 'date'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function additionalContents()
    {
        return $this->hasMany(AdditionalContent::class);
    }

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
