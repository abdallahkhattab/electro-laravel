<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\dashboard\Brand;
use App\Models\dashboard\Product;
use App\Models\dashboard\Category;
use App\Models\dashboard\SubCategory;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $products = Product::all();
        return view('dashboard.includes.products.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = SubCategory::all();      
        return view('dashboard.includes.products.create-product',compact('categories','brands','subcategories'));
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

   
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:999999.99',
            'compare_at_price' => 'nullable|numeric|gt:price|max:999999.99',
            'qty' => 'required|integer|min:0',
            'sku' => 'nullable|string|unique:products,sku|max:50', // Nullable, unique, and optional
            'subcategory_id' => 'required|exists:sub_categories,id',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'featured' => 'boolean',
            'status' => 'boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validation for multiple images
        ]);
    
        // Store Product
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->slug = Str::slug($request->input('name'));  // Assuming you need slug
        $product->price = $request->input('price');
        $product->compare_at_price = $request->input('compare_price');
        $product->qty = $request->input('qty');
        $product->sku = $request->input('sku') ?? Product::generateSku();
        $product->subcategory_id = $request->input('subcategory_id');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->featured = $request->boolean('is_featured');
        $product->status = $request->boolean('status');

        $product->barcode = $request->input('barcode') ?: Product::generateBarcode();

        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $media) {
                $imagePath = $media->store('media', 'public'); // Save in 'public/product_images'
    
                // Save the image path in the product_images table
                $product->media()->create([
                    'image_path' => $imagePath,
                ]);
            }
        }
    
    
       

       // dd($request->all());
    
        return redirect()->route('dashboard.products')->with('success', 'Product created successfully');
    
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
         
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $categories = Category::all();
        
        return view('dashboard.includes.products.edit-product',compact('product','subcategories','brands','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:999999.99',
            'compare_at_price' => 'nullable|numeric|gt:price|max:999999.99',
            'qty' => 'required|integer|min:0',
            'sku' => 'nullable|string|unique:products,sku|max:50', // Nullable, unique, and optional
            'subcategory_id' => 'required|exists:sub_categories,id',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'featured' => 'boolean',
            'status' => 'boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validation for multiple images
        ]);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->slug = Str::slug($request->input('name'));  // Assuming you need slug
        $product->price = $request->input('price');
        $product->compare_at_price = $request->input('compare_price');
        $product->qty = $request->input('qty');
        $product->sku = $request->input('sku') ?? Product::generateSku();
        $product->subcategory_id = $request->input('subcategory_id');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->featured = $request->boolean('is_featured');
        $product->status = $request->boolean('status');

        $product->barcode = $request->input('barcode') ?: Product::generateBarcode();

        $product->update();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $media) {
                $imagePath = $media->store('media', 'public'); // Save in 'public/product_images'
    
                // Save the image path in the product_images table
                $product->media()->create([
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('dashboard.products')-> with('success','Product Updated Successfully');

      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
    }
}
