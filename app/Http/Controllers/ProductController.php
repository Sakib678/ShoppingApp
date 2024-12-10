<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $products = Product::with('productType')->get();
    //dd($products);
    return view('product',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-product');
        return view("productform");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->except('_token'));

        return Redirect::route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::with('productType')->find($id);
        $products = array($product); 
        return view('product',['products'=>$products]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        Gate::authorize('edit-product');
        $product = Product::find($id);
        return view('productform',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
         
        Gate::authorize('edit-product'); 

        $product->update([
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'product_type_id' => $request->input('product_type_id'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Gate::authorize('delete-product');
        $product = Product::find($id);
        $product->delete();
        return Redirect::route('home');
        }
    }

