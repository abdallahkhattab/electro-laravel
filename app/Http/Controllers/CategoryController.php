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
    public function index(Request $request)
    {

        $search = $request->input('table_search');

        $query = Category::query();

        if(!empty($search)){
            $query->where('name', 'LIKE', "%{$search}%")
            ->orWhere('slug', 'LIKE', "%{$search}%");
      }
        $categories = Category::paginate(10);

        return view('dashboard.includes.categories.categories',compact('categories','search'));
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


        try{
 
        $category = new Category();
        $category->name = $request->input('name');

        $category->slug = Str::slug($request->input('name'));

        $category->status = $request->input('status',true);

        $category->save();

     return redirect()->route('dashboard.category')->with('success','Catrgory created successfully');

        }catch(\Exception $e){

        return redirect()->route('dashboard.category')->withErrors('Error creating category.');

        }
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
        return view('dashboard.includes.categories.edit-category',compact('category'));
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

        try{
            $category = Category::findorFail($id);

            $category->name = $request->input('name');
            $category->slug = Str::slug($request->input('name'));
            $category->status = $request->input('status') == '1' ? true : false;
            $category->save();
    
            return redirect()->route('dashboard.category')->with('success','Category Updated successfully');
    
        }catch(\Exception $r){

            return redirect()->route('dashboard.category')->withErrors('something went wrong.');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('dashboard.category')->with('success', 'Category deleted successfully');
    

    }
}
