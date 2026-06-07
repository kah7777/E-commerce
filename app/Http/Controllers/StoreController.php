<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return response()->json([
            'stores' => $stores,
           'message' => 'stores were sent',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        $data = $request->validate([]);
        $store = Store::create($data);
        return response()->json([
            'store' => $store,
            'message' => 'store was created'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return response()->json([
            'store' => $store,
            'message' => 'store was sent',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $data = $request->validate([]);
        $store->update($data);
        return response()->json([
            'store' => $store,
            'message' => 'store was updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $deleted = $store->delete();
        if($deleted == 1){
            return response()->json([
                'message' => 'store was deleted'
            ]);
        }
    }
}
