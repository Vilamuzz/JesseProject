<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalContentImage extends Model
{
    protected $fillable = ['image_path', 'additional_content_id'];

    public function additionalContent()
    {
        return $this->belongsTo(AdditionalContent::class);
    }
}
