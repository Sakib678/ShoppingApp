<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    
    public function index(Request $request)
{
    $query = Product::query();

    if ($request->has('search') && !empty($request->input('search'))) {
        $query->where('name', 'like', '%' . $request->input('search') . '%')
              ->orWhere('title', 'like', '%' . $request->input('search') . '%');
    }

    if ($request->has('filter')) {
        switch ($request->input('filter')) {
            case 'book':
                $query->where('product_type_id', 1);
                break;
            case 'music':    
                $query->where('product_type_id', 2);
                break;
            case 'game':
                $query->where('product_type_id', 3);
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
        }
    }

    $products = $query->paginate(10);

    return view('product', ['products' => $products]);
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
        Gate::authorize('create-product');
        
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_images', 'public');
        }

        Product::create($data);

        return Redirect::route('home');
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::with('productType')->find($id);
        $products = new LengthAwarePaginator(
            [$product], 
            1,
            1,
            ['path' => url()->current()] 
        );
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
    public function update(Request $request, Product $product, $id)
    {
         
        Gate::authorize('edit-product'); 
        $product = Product::find($id);


        $data = $request->only(['title', 'name', 'product_type_id', 'price']);

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $data['image'] = $request->file('image')->store('product_images', 'public');
    }

    $product->update($data);
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

