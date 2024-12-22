<x-background-layout>
    <form method="GET" action="{{ route('home') }}" class="mb-4">
    <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}" class="border rounded p-3 mr-2 w-full"
        />
        
        
        
        <label for="filter" class="mr-2">Filter by:</label>
        <select name="filter" id="filter" class="border rounded p-3">
            <option value="">All</option>
            <option value="book" {{ request('filter') == 'book' ? 'selected' : '' }}>Books</option>
            <option value="game" {{ request('filter') == 'game' ? 'selected' : '' }}>Games</option>
            <option value="music" {{ request('filter') == 'music' ? 'selected' : '' }}>Music</option>
            <option value="price_asc" {{ request('filter') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
            <option value="price_desc" {{ request('filter') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
        </select>
        <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded">Filter</button>
        <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded">Search</button>
    </form>

    <div class=" container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
    @forelse ($products as $product)    
        <x-product-card :product="$product" />  
    @empty
        <p>No Products</p>
    @endforelse
    </div>
    </div> 

    <div class="mt-4">
        {{ $products->appends(request()->query())->links() }}
    </div>
</x-background-layout>
