<?php

namespace App\Http\Controllers\Backend;

use App\Models\AttributeValue;
use App\Models\Attribute;
use Validator;
use App\Traits\LogsErrors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeValueController extends Controller
{
    use LogsErrors;

    public function index(Request $request)
    {
        $attributes = Attribute::where('status', 'Active')->get();

        if ($request->ajax()) {
            $perPage = $request->get('per_page', 10);
            $attributeValues = AttributeValue::with('attribute')->paginate($perPage);

            return response()->json([
                'attributeValues' => $attributeValues,
            ]);
        }

        // For the non-AJAX request (when loading the view)
        return view('pages.backend.attribute-values.index', compact('attributes'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the input fields
            $validator = Validator::make($request->all(), [
                'value' => 'required|string|max:255',
                'attribute_id' => 'required|exists:attributes,id',
                'status' => 'required|in:Active,Inactive',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            // Get the validated data
            $data = $validator->validated();

            // Create the attribute value record
            $attributeValue = AttributeValue::create([
                'value' => $data['value'],
                'attribute_id' => $data['attribute_id'],
                'status' => $data['status'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Attribute value created successfully.',
                'attributeValue' => $attributeValue
            ]);
        } catch (\Exception $e) {
            $this->logError('AttributeValue', 'Create', $e, $request->all());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            // Find the attribute value by ID
            $attributeValue = AttributeValue::findOrFail($id);

            return response()->json([
                'attributeValue' => $attributeValue
            ]);
        } catch (\Exception $e) {
            $this->logError('AttributeValue', 'Edit', $e, ['id' => $id]);

            return response()->json([
                'success' => false,
                'message' => 'Attribute value not found.'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        try {
            $attributeValue = AttributeValue::findOrFail($request->attribute_value_id);
            $validator = Validator::make($request->all(), [
                'value' => 'required|string|max:255',
                'status' => 'required|in:Active,Inactive',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $data = $validator->validated();

            $attributeValue->update([
                'value' => $data['value'],
                'status' => $data['status'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Attribute value updated successfully.',
                'attributeValue' => $attributeValue
            ]);
        } catch (\Exception $e) {
            $this->logError('AttributeValue', 'Update', $e, $request->all());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $attributeValue = AttributeValue::findOrFail($id);

            $attributeValue->delete();

            return response()->json([
                'success' => true,
                'message' => 'Attribute value deleted successfully.'
            ]);
        } catch (\Exception $e) {
            $this->logError('AttributeValue', 'Delete', $e, ['id' => $id]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}
