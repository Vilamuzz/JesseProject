<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = ['image_path', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
