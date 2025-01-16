@extends('MasterLayout')

@section('main_content')
    <div class="container-sm my-3">
        <h3 class="text-center">Add New Category</h3>
        <form action="{{ route('submit-category-data') }}" method="post">
            @csrf
            <div class="row flex-column align-items-center">
                <div class="mb-3 col-4">
                <label for="category_name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" />
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
                    <p>Category added successfully.</p>
                </div>
            @else
                <div class="alert alert-danger">
                    <p>Category creation failed.</p>
                </div>
            @endif
        @endif
    </div>
@endsection