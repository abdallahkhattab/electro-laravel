<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\dashboard\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::paginate(10);

        return view('dashboard.includes.categories.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view("dashboard.includes.categories.create-category");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|string|max:225',
        ]);

        $category = new Category();
        $category->name = $request->input('name');

        $category->slug = Str::slug($request->input('name'));

        $category->status = $request->input('status',true);

        $category->save();

        return redirect()->route('dashboard.category')->with('success','Catrgory created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //

        $category = Category::all();
       // return view('dashboard.includes.categories.create-category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'name' => 'required|string|max:225',
            'status' => 'required',  
        ]);

        $category = Category::findorFail($id);

        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->status = $request->input('status') == '1' ? true : false;
        $category->save();

        return redirect()->route('dashboard.category')->with('success','Category Created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
