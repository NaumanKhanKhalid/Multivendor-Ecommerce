<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ProductMeta;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductVariationAttribute;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $products = Product::with('primaryImage')->paginate($perPage);
        if ($request->ajax()) {
            return view('pages.backend.products.product_list', compact('products'))->render();
        }

        return view('pages.backend.products.index', compact('products'));
    }
    public function create()
    {
        $attributes = Attribute::orderBy("created_at", "desc")->paginate(10);
        $categories = Category::with('subcategories')->where('status', 'Active')->get();

        return view('pages.backend.products.create', compact('attributes', 'categories'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'categories' => 'required',
            'stock' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'sku' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:255',
            'long_description' => 'nullable|string',
            'product_type' => 'required|in:simple,variable',
            'banner_image' => 'nullable|image|mimes:jpeg,jpg,png',
            'thumbnails.*' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        DB::beginTransaction();

        try {
            $product = Product::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')) . '-' . Str::random(6),
                'sku' => $request->input('sku'),
                'stock' => $request->input('product_type') === 'simple' ? $request->input('stock') : null,
                'price' => $request->input('product_type') === 'simple' ? $request->input('price') : null,
                'short_description' => $request->input('short_description'),
                'long_description' => $request->input('long_description'),
                'type' => $request->input('product_type'),
            ]);

            $product->categories()->sync($request->input('categories', []));


            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');

                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                $relativePath = 'uploads/product/banners';

                $image->move(public_path($relativePath), $imageName);

                $fullImageUrl = url($relativePath . '/' . $imageName);
                ProductImage::create([
                    'product_id' => $product->id,
                    'file_path' => $fullImageUrl,
                    'is_primary' => true,
                    'sort_order' => 0,
                ]);
            }

            // Handle Thumbnails
            if ($request->hasFile('thumbnails')) {
                foreach ($request->file('thumbnails') as $index => $thumbnail) {
                    // Generate a unique filename
                    $imageName = time() . '_' . Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();

                    // Define destination relative to public/
                    $relativePath = 'uploads/product/thumbnails';

                    // Move file to public/uploads/product/thumbnails
                    $thumbnail->move(public_path($relativePath), $imageName);

                    // Generate full public URL
                    $fullThumbUrl = url($relativePath . '/' . $imageName);

                    // Save thumbnail info in the database
                    ProductImage::create([
                        'product_id' => $product->id,
                        'file_path' => $fullThumbUrl,
                        'is_primary' => false,
                        'sort_order' => $index + 1,
                    ]);
                }
            }

            $metaKeys = $request->input('meta_keys', []);
            $metaValues = $request->input('meta_values', []);
            foreach ($metaKeys as $index => $key) {
                if (!empty($key) && !empty($metaValues[$index])) {
                    ProductMeta::create([
                        'product_id' => $product->id,
                        'meta_key' => $key,
                        'meta_value' => $metaValues[$index],
                    ]);
                }
            }

            if ($request->input('product_type') === 'variable') {
                $variationType = $request->input('variation_type');

                foreach ($request->input('variations', []) as $variationData) {
                    $variation = new ProductVariation();
                    $variation->product_id = $product->id;
                    $variation->sku = $variationData['sku'] ?? 'SKU-' . uniqid();
                    $variation->price = $variationData['price'] ?? 0;
                    $variation->stock = $variationData['stock'] ?? 0;

                    if (isset($variationData['image']) && $variationData['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $variationImagePath = $variationData['image']->store('products/variations', 'public');
                        $variation->image = $variationImagePath;
                    }

                    $variation->save();

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
                }
            }

            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Product created successfully.',
                'redirect' => route('backend.products.index'),
            ]);
            // return redirect()->route('backend.products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // return back()->withErrors(['error' => 'Error creating product: ' . $e->getMessage()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Error creating product',
            ], 500);
        }
    }

}