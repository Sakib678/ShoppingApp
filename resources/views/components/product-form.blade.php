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
@if(Route::is('product.create') )
        <form method="POST" action="{{route('product.store')}}" >
@elseif(Route::is('product.edit') ) 
        <form method="POST" action="{{route('product.update', ['id'=>$product->id])}}" >
        <input type="hidden" name="_method" value="PUT">
@endif 
    @csrf

    <div class="p-2 m-2 rounded-lg border-2 border-blue-900 max-w-md">
        <div class="text-sm">
            <input name="title" type="text" placeholder="title" value="{{$product->title ?? ''}}" />
        </div>
        <p class="text-sm">
            <input name="name" type="text" placeholder="artist/author/console" value="{{$product->name ?? ''}}" />
        </p>
        <p>
            <input type="number" step='0.01' name="price" placeholder="price" value="{{$product->price ?? 0 / 100 }}" />
        </p>   
        <div>
        @if(Route::is('product.create') )
        <button type="submit" class="bg-gray-800 text-white mt-2 p-2">Add New</button>
        @elseif(Route::is('product.edit') )
        <button type="submit" class="bg-gray-800 text-white mt-2 p-2">Update</button>
           
        @endif
        </div>
    </div>
</form>
</div>