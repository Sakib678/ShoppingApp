<div>
    <div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
    <img class="max-h-48 w-full object-cover object-center" src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/photo/placeholder.png') }}" alt="Product Image" />
        <div class="p-4">
            <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{$product->name}}</h2>
            <p class="mb-2 text-base dark:text-gray-300 text-gray-700">{{$product->title}}</p>
            <p>Type: {{ $product->productType->type ?? 'N/A' }}</p>    
            <div class="flex items-center">
            <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">£{{$product->price}}</p>
            </div>
            <p class="ml-auto text-base font-medium text-green-500">20% off</p>
        </div>
        <div>  
                @can('edit-product')
                    <form action="{{ route('product.edit', $product->id) }}" method="get">
                        @csrf
                        <button type="submit" value="{{$product->id}}" class="bg-yellow-300 hover:bg-blue-700 text-gray-700 p-2 m-2 w-24 rounded-sm edit-product">Edit</button>
                    </form>
                @endcan
                @can('delete-product')
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type ="submit" class="bg-yellow-300 hover:bg-blue-700 text-gray-700 p-2 m-2 w-24 rounded-sm">Delete</button>
                    </form>
                @endcan
        </div>
            <div class="rounded-sm bg-yellow-300 hover:bg-blue-700 p-2 m-2 w-24">
                <a href="{{ route('product.show', $product->id) }}" class="text-gray-700">Select</a>
            </div>
    </div>


</div>
