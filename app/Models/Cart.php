<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
//     public function categories()
// {
//     return $this->belongsToMany(Category::class, 'carts','id', 'category_id');
//     // Or 'hasMany' depending on your database design
// }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function packages()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
