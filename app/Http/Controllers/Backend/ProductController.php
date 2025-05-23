<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\ProductVariationAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $perPage = $request->get('per_page', 10);
            // $categories = Category::with('subcategories')->paginate($perPage);
            return response()->json();
        }

        $attributes = Attribute::orderBy("created_at", "desc")->paginate(10);

        return view('pages.backend.products.index', compact('attributes'));
    }


    public function create()
    {
        $attributes = Attribute::orderBy("created_at", "desc")->paginate(10);
        $categories = Category::with('subcategories')->where('status', 'Active')->get();

        return view('pages.backend.products.create', compact('attributes', 'categories'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // 1. Create the product
            $product = Product::create([
                'name' => $request->input('name'),
                'categories' => $request->input('categories'),
                'slug' => uniqid(), 
            ]);

            // 2. Get variation type
            $variationType = $request->input('variation_type');

            // 3. Process variations
            foreach ($request->input('variations', []) as $index => $variationData) {
                // Create the variation
                $variation = new ProductVariation();
                $variation->product_id = $product->id;
                $variation->sku = $variationData['sku'] ?? 'SKU-' . uniqid();
                $variation->price = $variationData['price'] ?? 0;
                $variation->stock = $variationData['stock'] ?? 0;
                $variation->save();

                // === AUTO VARIATION TYPE ===
                if ($variationType === 'auto' && !empty($variationData['combination'])) {
                    $valueIds = explode('_', $variationData['combination']);
                    foreach ($valueIds as $valueId) {
                        $attributeValue = AttributeValue::find($valueId);

                        if ($attributeValue) {
                            ProductVariationAttribute::create([
                                'product_variation_id' => $variation->id,
                                'attribute_id' => $attributeValue->attribute_id,
                                'attribute_value_id' => $attributeValue->id,
                            ]);

                            ProductAttribute::firstOrCreate([
                                'product_id' => $product->id,
                                'attribute_id' => $attributeValue->attribute_id,
                            ]);
                        }
                    }
                }
                if ($variationType === 'manual' && isset($variationData['attributes'])) {
                    foreach ($variationData['attributes'] as $attributeId => $valueId) {
                        if ($valueId) {
                            ProductVariationAttribute::create([
                                'product_variation_id' => $variation->id,
                                'attribute_id' => $attributeId,
                                'attribute_value_id' => $valueId,
                            ]);

                            ProductAttribute::firstOrCreate([
                                'product_id' => $product->id,
                                'attribute_id' => $attributeId,
                            ]);
                        }
                    }
                }

                // === Manual variation logic would go here ===
            }

            DB::commit();
            return redirect()->route('backend.products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->withErrors(['error' => 'Error creating product: ' . $e->getMessage()]);
        }
    }
}