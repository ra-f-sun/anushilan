<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories(Request $request){
        $searchCategory = $request->search;
        $categories = Category::with(['children'])
            ->where('parent_id', 0)
            ->where(function ($query) {
                $query->where('is_premium', 0)
                      ->orWhereNull('is_premium');
            })
            ->where('status', 1);
        if ($searchCategory && !empty($searchCategory)) {
            $categories = $categories->where('category_name', 'LIKE', '%' . $searchCategory . '%');
        }
        $categories = $categories->get();
        return view('frontend.categories', compact('categories','searchCategory'));
    }
}
