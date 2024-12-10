@if ($errors->any())
    <div class="bg-red-600 border-solid rounded-md border-2 border-red-700">
        <ul>
        @foreach ($errors->all() as $error)
            <li class="text-lg text-gray-100">{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
    
<div>

@if(Route::is('product.edit') )
    @can('edit-product')
    <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}">
        @method('PUT')
        @csrf
    @endcan    
@elseif(Route::is('product.create'))
    @can('create-product')
    <form method="POST" action="{{ route('product.store') }}">
        @csrf
    @endcan    
@elseif(Route::is('product.destroy'))
    @can('delete-product')
    <form method="POST" action="{{ route('product.destroy', ['id' => $product->id]) }}">
        @method('DELETE')
        @csrf
    @endcan    
@endif

    <div class="p-2 m-2 rounded-lg border-2 border-blue-900 max-w-md">
        <div class="text-sm">
            <input name="title" type="text" placeholder="Title" value="{{$product->title ?? ''}}" required/>
        </div>
        <p class="text-sm">
            <input name="name" type="text" placeholder="Artist/Author/Console" value="{{$product->name ?? ''}}" required />
        </p>
        <p class="text-sm">
            <label for="product_type_id" class="block text-gray-700">Product Type:</label>
                <select name="product_type_id" id="product_type_id" class="w-full border-2 p-2 rounded" required>
                    <option value="1" {{ isset($product) && $product->product_type_id == 1 ? 'selected' : '' }}>Book</option>
                    <option value="2" {{ isset($product) && $product->product_type_id == 2 ? 'selected' : '' }}>Music</option>
                    <option value="3" {{ isset($product) && $product->product_type_id == 3 ? 'selected' : '' }}>Game</option>
                </select>
        </p>
        <p>
            <input type="number" step='0.01' name="price" placeholder="price" value="{{$product->price ?? 0 / 100 }}" />
        </p>   
        <div>
        @if(Route::is('product.create'))
            <button type="submit" class="bg-blue-500 text-white mt-2 p-2 rounded">Create Product</button>
        @elseif(Route::is('product.edit'))
            <button type="submit" class="bg-gray-800 text-white mt-2 p-2 rounded">Update</button>
        @elseif(Route::is('product.destroy'))
            <button type="submit" class="bg-red-600 text-white mt-2 p-2 rounded">Delete</button>
        @endif
        </div>
    </div>
</form>
</div>