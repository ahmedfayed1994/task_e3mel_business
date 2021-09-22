<?php

namespace App;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'category_id', 'description', 'rating', 'views', 'level', 'hours', 'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LatestScope());
    }
}
