<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Str;
use Validator;
use App\Models\Category;
use App\Traits\LogsErrors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    use LogsErrors;

    public function index(Request $request)
    {
        // Get only active categories
        $categories = Category::where('status', 'Active')->get();
    
        // Handle the AJAX request
        if ($request->ajax()) {
            $perPage = $request->get('per_page', 10);
            $subCategories = SubCategory::with('category')->paginate($perPage);
    
            return response()->json([
                'subCategories' => $subCategories,
                'categories' => $categories
            ]);
        }
    
        // For the non-AJAX request (when loading the view)
        return view('pages.backend.sub_categories.index');
    }
    
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'category_id' => 'required',
                'slug' => 'nullable|string|max:255|unique:sub_categories,slug',
                'subcategory_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|in:Active,Inactive',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $data = $validator->validated();

            if ($request->hasFile('subcategory_image')) {
                $imageName = time() . '.' . $request->subcategory_image->extension();
                $request->subcategory_image->move(public_path('uploads/categories'), $imageName);
                $data['subcategory_image'] = 'uploads/categories/' . $imageName;
            }

            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            $sub_category = SubCategory::create([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'subcategory_image' => $data['subcategory_image'],
                'status' => $data['status'],
            ]);

            $sub_category->load('category');

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully.',
                'sub_category' => $sub_category
            ]);

        } catch (\Exception $e) {
            $this->logError('Sub Category', 'Create', $e, $request->all());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }

    public function edit($id)
{
    // Find the subcategory by ID
    $sub_category = SubCategory::findOrFail($id);
    
    // Get all active categories for the dropdown
    $categories = Category::where('status', 'Active')->get();

    // Return the subcategory and the categories as JSON
    return response()->json([
        'sub_category' => $sub_category,
        'categories' => $categories
    ]);
}

    public function update(Request $request)
    {
        try {


            $sub_category = SubCategory::findOrFail($request->sub_category_id);

            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'name' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:sub_categories,slug,' . $sub_category->id,
                'subcategory_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|in:Active,Inactive',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $data = $validator->validated();

            if ($request->hasFile('subcategory_image')) {
                if (Storage::exists($sub_category->subcategory_image)) {
                    Storage::delete($sub_category->subcategory_image);
                }

                $imageName = time() . '.' . $request->subcategory_image->extension();
                $request->subcategory_image->move(public_path('uploads/sub_categories'), $imageName);
                $data['subcategory_image'] = 'uploads/sub_categories/' . $imageName;
            }

            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            if ($data['slug'] !== $sub_category->slug) {
                $exists = $sub_category->subCategorySlugHistories()
                    ->where('old_slug', $sub_category->slug)
                    ->exists();

                if (!$exists) {
                    $sub_category->subCategorySlugHistories()->create([
                        'old_slug' => $sub_category->slug,
                        'changed_by' => auth()->id(),
                    ]);
                }
            }

            $sub_category->update([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'subcategory_image' => $data['subcategory_image'] ?? $sub_category->subcategory_image,
                'status' => $data['status'],
            ]);

            $sub_category->load('category');

            return response()->json([
                'success' => true,
                'message' => 'Sub Category updated successfully.',
                'sub_category' => $sub_category
            ]);

        } catch (\Exception $e) {
            $this->logError('Sub Category', 'Edit', $e, $request->all());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'.$e->getMessage()
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            $sub_category = SubCategory::findOrFail($id);

            if (Storage::exists($sub_category->subcategory_image)) {
                Storage::delete($sub_category->subcategory_image);
            }

            $sub_category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Sub Category deleted successfully.'
            ]);
        } catch (\Exception $e) {
            $this->logError('Sub Category', 'Delete', $e, ['sub_category_id' => $id]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

}
