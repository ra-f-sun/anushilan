<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function allOrder()
    {
        $orders = DB::table('orders')
        ->leftJoin('categories', 'orders.category_id', '=', 'categories.id')
        ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
        ->leftJoin('package_to_categories', 'packages.id', '=', 'package_to_categories.package_id')
        ->leftJoin('categories as package_categories', 'package_to_categories.category_id', '=', 'package_categories.id') // Join to get the categories related to the package
        ->select('orders.*',
                 DB::raw('CASE
                            WHEN orders.category_id != 0 THEN categories.category_name
                            ELSE GROUP_CONCAT(package_categories.category_name SEPARATOR ", ")
                          END as category_or_package_name'))
        ->groupBy('orders.id')
        ->orderBy('orders.id', 'desc')
        ->get();
        return view('admin.order', compact('orders'));
    }
}
