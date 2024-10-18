<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Question extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $guarded = [];

    public function options()
    {
        return $this->hasMany(Options::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
