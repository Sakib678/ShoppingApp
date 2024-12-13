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
    
    public function index(Request $request)
    {
        $query = Product::with('productType');

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
    public function update(Request $request, Product $product, $id)
    {
         
        Gate::authorize('edit-product'); 
        $product = Product::find($id);


        $product->update([
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'product_type_id' => $request->input('product_type_id'),
            'price' => $request->input('price'),
        ]);

        $product->save();

        // Redirect to the product index page or the specific product page
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
    public function search(Request $request)
        {
            $search = $request->input('search');
            $results = Product::where('name', 'like', "%$search%")
                                ->orWhere('title', 'like', "%$search%")
                                ->paginate(10);
            
            return view('product.search', ['results' => $results]);
            }     
        
    }

