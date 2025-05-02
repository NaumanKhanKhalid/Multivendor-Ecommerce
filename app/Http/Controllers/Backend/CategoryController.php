<?php

namespace App\Http\Controllers\Backend;

use Str;
use Validator;
use App\Models\Category;
use App\Traits\LogsErrors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use LogsErrors;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perPage = $request->get('per_page', 10);
            $categories = Category::with('subcategories')->paginate($perPage);
            return response()->json($categories);
        }

        return view('pages.backend.categories.index');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:categories,slug',
                'category_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|in:Active,Inactive',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $data = $validator->validated();

            if ($request->hasFile('category_image')) {
                $imageName = time() . '.' . $request->category_image->extension();
                $request->category_image->move(public_path('uploads/categories'), $imageName);
                $data['category_image'] = 'uploads/categories/' . $imageName;
            }

            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            $category = Category::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'category_image' => $data['category_image'],
                'status' => $data['status'],
            ]);

            $category->load('subcategories');

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully.',
                'category' => $category
            ]);

        } catch (\Exception $e) {
            $this->logError('Category', 'Create', $e, $request->all());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
    public function update(Request $request)
    {
        try {


            $category = Category::findOrFail($request->category_id);

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
                'category_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|in:Active,Inactive',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $data = $validator->validated();

            if ($request->hasFile('category_image')) {
                if (Storage::exists($category->category_image)) {
                    Storage::delete($category->category_image);
                }

                $imageName = time() . '.' . $request->category_image->extension();
                $request->category_image->move(public_path('uploads/categories'), $imageName);
                $data['category_image'] = 'uploads/categories/' . $imageName;
            }

            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            if ($data['slug'] !== $category->slug) {
                $exists = $category->slugHistories()
                    ->where('old_slug', $category->slug)
                    ->exists();

                if (!$exists) {
                    $category->slugHistories()->create([
                        'old_slug' => $category->slug,
                        'changed_by' => auth()->id(),
                    ]);
                }
            }

            $category->update([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'category_image' => $data['category_image'] ?? $category->category_image,
                'status' => $data['status'],
            ]);

            $category->load('subcategories');

            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully.',
                'category' => $category
            ]);

        } catch (\Exception $e) {
            $this->logError('Category', 'Edit', $e, $request->all());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);

            if (Storage::exists($category->category_image)) {
                Storage::delete($category->category_image);
            }

            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully.'
            ]);
        } catch (\Exception $e) {
            $this->logError('Category', 'Delete', $e, ['category_id' => $id]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

}
