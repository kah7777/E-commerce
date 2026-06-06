<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products,
            'message' => 'products sent successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([]);
        $product = Product::create($data);

        return response()->json([
            'products' => $product,
            'message' => 'products sent successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
            'products' => $product,
            'message' => 'products sent successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([]);
        $product->update($data);
        return response()->json([
            'products' => $product,
            'message' => 'products sent successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $delete = $product->delete();
        if ($delete == 1) {
            return response()->json([
                'message' => 'product was deleted successfully',
            ]);
        }
    }
}
