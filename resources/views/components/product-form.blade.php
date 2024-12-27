@if ($errors->any())
    <div class="bg-red-600 border-solid rounded-md border-2 border-red-700 p-4">
        <ul>
        @foreach ($errors->all() as $error)
            <li class="text-lg text-gray-100">{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div>
    @if(Route::is('product.edit'))
        <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
    @elseif(Route::is('product.create'))
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
    @elseif(Route::is('product.destroy'))
        <form method="POST" action="{{ route('product.destroy', ['id' => $product->id]) }}">
            @method('DELETE')
            @csrf
    @endif

    <div class="p-2 m-2 rounded-lg border-2 border-blue-900 max-w-md">
        <div class="text-sm mb-4">
            <input name="title" type="text" placeholder="Title" value="{{ $product->title ?? '' }}" class="w-full p-2 border rounded" required />
        </div>
        <div class="text-sm mb-4">
            <input name="name" type="text" placeholder="Artist/Author/Console" value="{{ $product->name ?? '' }}" class="w-full p-2 border rounded" required />
        </div>
        <div class="text-sm mb-4">
            <select name="product_type_id" id="product_type_id" class="w-full border-2 p-2 rounded" required>
                <option value="1" {{ isset($product) && $product->product_type_id == 1 ? 'selected' : '' }}>Book</option>
                <option value="2" {{ isset($product) && $product->product_type_id == 2 ? 'selected' : '' }}>Music</option>
                <option value="3" {{ isset($product) && $product->product_type_id == 3 ? 'selected' : '' }}>Game</option>
            </select>
        </div>
        <div class="text-sm mb-4">
            <input type="number" step="0.01" name="price" placeholder="Price" value="{{ $product->price ?? '' }}" class="w-full p-2 border rounded" required />
        </div>
        <div class="text-sm mb-4">
            <label for="image">Product Image:</label>
            <input type="file" name="image" id="image" class="w-full p-2 border rounded">
        </div>
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