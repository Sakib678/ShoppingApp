

<div>
    <div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
        <img class="h-full w-full object-cover object-center " src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/CD_autolev_crop_new.jpg/220px-CD_autolev_crop_new.jpg" alt="Product Image" />
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
        <div>  
                @can('can-edit-product')
                <button value="{{$product->id}}" class="bg-yellow-300 hover:bg-blue-700 text-gray-700 p-2 m-2 w-24 rounded-sm edit-product">Edit</button>
                
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type ="submit" class="bg-yellow-300 hover:bg-blue-700 text-gray-700 p-2 m-2 w-24 rounded-sm">Delete</button>
                </form>
                @endcan
        </div>
        <button value="{{$product->id}}" 
            class="bg-yellow-300 hover:bg-blue-700 text-gray-700 p-2 m-2 w-24 rounded-sm select-product">
            Select
            </button>
        </div>
    </div>


</div>
