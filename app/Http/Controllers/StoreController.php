<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\vegetable;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = new Store();
        $store->latitude = 39.91402764039571;
        $store->longitude = 141.1007601246386;
        $vegetables = Vegetable::all();
        return view('stores.create', compact('store', 'vegetables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $store = new Store();

        // dd($request);

        if (!empty($request->file('img_path'))) {
            $path = $request->file('img_path')->store('images', 'public');
            $store->img_path = $path;
        }

        $store->vegetable_id = $request->vegetable_id;
        $store->price = $request->price;
        $store->address = $request->address;
        $store->latitude = $request->latitude;
        $store->longitude = $request->longitude;
        // dd($store);
        $store->save();
        return redirect()->route('store.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $zoom = 15;
        return view('stores.show', compact('store', 'zoom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $vegetables = Vegetable::all();
        $zoom = 30;
        return view('stores.edit', compact('store', 'vegetables', 'zoom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
    {
        if (!empty($request->file('img_path'))) {
            $path = $request->file('img_path')->store('images', 'public');
            $store->img_path = $path;
        }
        $store->vegetable_id = $request->vegetable_id;
        $store->price = $request->price;
        $store->address = $request->address;
        $store->latitude = $request->latitude;
        $store->longitude = $request->longitude;

        $store->save();

        return redirect()->route('store.index', $store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('store.index');
    }
}
