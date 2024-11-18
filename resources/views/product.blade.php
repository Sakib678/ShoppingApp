<x-background-layout>
    <div class=" container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
    @forelse ($products as $product)    
        <x-product-card :product="$product" />  
    @empty
        <p>No Products</p>
    @endforelse
    </div>
    </div> 
</x-background-layout>
