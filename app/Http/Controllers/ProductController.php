<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homePage()
    {
        $products = Product::latest()->get();
        return view('alpine.products',compact('products'));
    }
    public function index()
    {
        $products = Product::latest()->get();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return Product::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quentity' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $product = Product::create($validated);
        // return response()->json($product);
        return response()->json(['message' => 'Product created successfully!', 'product' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quentity' => 'required|string',
        ]);
        $product = Product::find($id);
        $product->update($validated);
        return response()->json(['message' => 'Product updated successfully!', 'product' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product,$id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully!'], 200);
    }
}
