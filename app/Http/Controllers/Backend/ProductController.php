<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $perPage = $request->get('per_page', 10);
            // $categories = Category::with('subcategories')->paginate($perPage);
            return response()->json();
        }

        return view('pages.backend.products.index');
    }
}
