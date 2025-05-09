<?php

namespace App\Http\Controllers\Backend;

use App\Models\Attribute;
use App\Models\Category;
use Str;
use Validator;
use App\Traits\LogsErrors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AttributeController extends Controller
{
    use LogsErrors;

    public function index(Request $request)
    {

        // Handle the AJAX request
        if ($request->ajax()) {
            $perPage = $request->get('per_page', 10);
            $attributes = Attribute::paginate($perPage);

            return response()->json([
                'attributes' => $attributes,
            ]);
        }

        // For the non-AJAX request (when loading the view)
        return view('pages.backend.attributes.index');
    }

    public function store(Request $request)
    {
        try {
            // Validate the input fields
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'type' => 'required',
                'status' => 'required|in:Active,Inactive',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            // Get the validated data
            $data = $validator->validated();

            // Create the attribute record
            $attribute = Attribute::create([
                'name' => $data['name'],
                'type' => $data['type'],
                'status' => $data['status'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Attribute created successfully.',
                'attribute' => $attribute
            ]);
        } catch (\Exception $e) {
            $this->logError('Attribute', 'Create', $e, $request->all());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            // Find the attribute by ID
            $attribute = Attribute::findOrFail($id);

            return response()->json([
                'attribute' => $attribute
            ]);
        } catch (\Exception $e) {
            $this->logError('Attribute', 'Edit', $e, ['id' => $id]);

            return response()->json([
                'success' => false,
                'message' => 'Attribute not found.'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        try {
            $attribute = Attribute::findOrFail($request->attribute_id);
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'type' => 'required|in:select,color,size,material',
                'status' => 'required|in:Active,Inactive',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $data = $validator->validated();


            $attribute->update([
                'name' => $data['name'],
                'type' => $data['type'],
                'status' => $data['status'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Attribute updated successfully.',
                'attribute' => $attribute
            ]);
        } catch (\Exception $e) {
            $this->logError('Attribute', 'Update', $e, $request->all());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Find the attribute by ID
            $attribute = Attribute::findOrFail($id);

            // Delete the attribute record
            $attribute->delete();

            return response()->json([
                'success' => true,
                'message' => 'Attribute deleted successfully.'
            ]);
        } catch (\Exception $e) {
            $this->logError('Attribute', 'Delete', $e, ['id' => $id]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}
