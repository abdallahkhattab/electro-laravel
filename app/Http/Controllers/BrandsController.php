<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\dashboard\Brand;
use Symfony\Component\Console\Input\Input;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $brands = Brand::all();

        return view('dashboard.includes.brands.brands',compact('brands'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('dashboard.includes.brands.create-brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request-> validate([
            'name' => 'required',
            'status' => 'required',
            
        ]);

        $brand = new Brand();

        $brand -> name = $request ->input('name');

        $brand -> status = $request ->input('status');

        $brand -> slug =  Str::slug($request->input('name'));

       // dd($request->all());

        $brand->save();

        return redirect()->route('dashboard.brands')->with('success', 'Brand created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //

        return view('dashboard.includes.brands.edit-brand',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //

        $request -> validate([
            'name' => 'required',
            'status' => 'required',
        ]);


        $brand -> name = $request->input('name');
        $brand -> status = $request ->input('status');
        $brand -> slug =  Str::slug($request->input('name'));

        $brand->update();

        return redirect()->route('dashboard.brands')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //

        $brand->delete();

        return redirect()->route('dashboard.brands')->with('success', 'Brand deleted successfully.');
    }
}
