<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::all();
        return response()->json([
            'categories'=>$categories,
            'message'=>'categories were sent',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validate([]);
        $category = Category::create($data);
        return response()->json([
            'category' => $category,
            'message' => 'category was added'
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
            'category' => $category,
            'message' => 'category was shown',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category = Category::update($data);
        return response()->json([
            'category' => $category,
            'message' => 'category was updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
        if($deleted == 1 ){
            return response()->json([
                'message' => 'category was deleted',
            ]);
        }
    }
}
