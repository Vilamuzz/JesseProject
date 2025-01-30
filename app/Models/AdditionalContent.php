<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalContent extends Model
{
    protected $fillable = ['type', 'description', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function images()
    {
        return $this->hasMany(AdditionalContentImage::class);
    }
}
