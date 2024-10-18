<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{

    protected $guarded = [];
    use HasFactory, InteractsWithMedia;
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function mybookshelves()
{
    return $this->hasMany(MyBookshelf::class, 'category_id');
}
}
