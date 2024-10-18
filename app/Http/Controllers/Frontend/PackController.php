<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Mybookshelf;
use App\Models\Package;
use App\Models\Question;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function index(){
        $packages = Package::with('categories')->where('status',1)->get();
        $userPackageIds = Mybookshelf
        ::where('user_id', auth()->id())
        ->pluck('package_id')
        ->toArray();
        return view('frontend.package_question', compact('packages','userPackageIds'));
    }

    public function packageDetails($id){
        $packages = Package::find($id);
        return view('frontend.package_details', compact('packages'));
    }

    public function showMyPackage()
    {
        $packageIds = Mybookshelf::where('user_id',auth()->id())->pluck('package_id');
        // dd( $packages);
        $packages = Package::whereIn('id',$packageIds)->get();
        // dd($packages);
        return view('frontend.package.package', compact('packages'));
    }

    public function showMyPackageCategory($id)
    {
        $packages = Package::with('categories')->findOrFail($id);
        // dd($packages->categories);
        return view('frontend.package.category', compact('packages'));
    }

    public function showMyPackageCategoryQuestion($id)
    {
        $filter = request('filter', 'all');

        $query = Question::where('category_id', $id)->where('status', 1);

        if ($filter === 'newest') {
            $query->orderBy('created_at', 'desc');
        }

        $questions = $query->get();
        $totalQuestion = $questions->count();

        return view('frontend.package.question', compact('questions', 'totalQuestion', 'id'));
    }

    public function questionShow($id)
    {

    }
}
