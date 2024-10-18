<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Package extends Model implements HasMedia
{
    protected $guarded = [];
    use HasFactory, InteractsWithMedia;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'package_to_categories');
    }
}
