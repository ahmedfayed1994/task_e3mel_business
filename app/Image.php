<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['path', 'imageable_type', 'imageable_id'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function path() {
        return Storage::url($this->path);
    }
}
