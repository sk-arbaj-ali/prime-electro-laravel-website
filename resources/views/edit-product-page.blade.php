@extends('MasterLayout')

@section('main_content')
    <div class="container-sm my-3">
        <h3 class="text-center">Edit product</h3>
        <form action="{{ route('submit-product-data-for-seller') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}" />
            <div class="row flex-column align-items-center">
                <div class="mb-3 col-4">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            @if($category->id == $product->category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-4">
                    <label for="product_name" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" />
                </div>
                
                <div class="mb-3 col-4">
                    <label for="product_price" class="form-label">Product Price:</label>
                    <input type="text" class="form-control" id="product_price" name="product_price" value="{{ $product->product_price }}" />
                </div>
                <div class="mb-3 col-4">
                    <label for="available_stock" class="form-label">Available Stock:</label>
                    <input type="text" class="form-control" id="available_stock" name="available_stock" value="{{ $product->available_stock }}" />
                </div>
                <div class="mb-3 col-4">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="mb-3 col-4">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" accept=".jpg,.png.jpeg" class="form-control" name="image" id="image" />
                </div>
                <div class="text-center col-4">
                    <button type="reset" class="btn btn-subtle me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Edit Product</button>
                </div>
            </div>
        </form>
        
    </div>
@endsection