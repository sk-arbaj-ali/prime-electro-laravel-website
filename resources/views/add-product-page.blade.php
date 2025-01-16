@extends('MasterLayout')

@section('main_content')
    <div class="container-sm my-3">
        <h3 class="text-center">Add new product</h3>
        <form action="{{ route('submit-product-data') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row flex-column align-items-center">
                <div class="mb-3 col-4">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-4">
                    <label for="product_name" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" />
                </div>
                
                <div class="mb-3 col-4">
                    <label for="product_price" class="form-label">Product Price:</label>
                    <input type="text" class="form-control" id="product_price" name="product_price" />
                </div>
                <div class="mb-3 col-4">
                    <label for="available_stock" class="form-label">Available Stock:</label>
                    <input type="text" class="form-control" id="available_stock" name="available_stock" />
                </div>
                <div class="mb-3 col-4">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="mb-3 col-4">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" accept=".jpg,.png.jpeg" class="form-control" name="image" id="image" />
                </div>
                <div class="text-center col-4">
                    <button type="reset" class="btn btn-subtle me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        
        @if(session('success'))
            @if(session('success') == true)
                <div class="alert alert-success">
                    <p>Product added successfully.</p>
                </div>
            @else
                <div class="alert alert-danger">
                    <p>Product creation failed.</p>
                </div>
            @endif
        @endif
    </div>
@endsection