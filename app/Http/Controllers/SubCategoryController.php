<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\dashboard\Category;
use App\Models\dashboard\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $subcategories = SubCategory::with('category')->get();

        return view('dashboard.includes.categories.subcategory',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $categories = Category::all();
        return view('dashboard.includes.categories.create-subcategory',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

   //   $request-> validate(['name|required' ,'category_id|required','slug|required']);

       
   $request-> validate([
    'name' => 'required|string|max:225',
    'category_id' => 'required|exists:categories,id',
    'status' => 'required',
   ]);

   

    // Create a new SubCategory instance
    $subCategory = new SubCategory();

    // Assign name and generate slug
    $subCategory->name = $request->input('name');
    $subCategory->slug = Str::slug($request->input('name'));  // Use Str::slug correctly
    $subCategory->category_id = $request->input('category_id');

    $subCategory->status = $request->input('status');

    $subCategory->save();

/*
      SubCategory::create([
            'category' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->Str::slug($request->name),
        ]);*/
      
        dd($request->all()); // or Log::info($request->all());
         return redirect()->route('dashboard.subCategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //

        $categories = Category::all();
        return view('dashboard.includes.categories.edit-subcategory',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
        
       // Validate the incoming data
       $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'status' => 'required',
    ]);

    // Update the existing subcategory's fields
    $subCategory->name = $request->input('name');
    $subCategory->category_id = $request->input('category_id');
    $subCategory->slug = Str::slug($request->input('name'));
    $subCategory->status = $request->input('status');

    // Save the changes to the existing subcategory
    $subCategory->save();

    // Redirect back to the subcategory list with a success message

    return redirect()->route('dashboard.subCategory')->with('success', 'Subcategory updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //

        $subCategory->delete();
        return redirect()->route('dashboard.subCategory')->with('success', 'Subcategory deleted successfully.');
    }
}
