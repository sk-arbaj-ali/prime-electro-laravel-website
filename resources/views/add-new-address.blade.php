@extends('MasterLayout')

@section('main_content')
    <div class="container-sm my-3">
        <h3 class="text-center">Add new Address</h3>
        <form action="{{ route('add-new-address') }}" method="post">
            @csrf
            <div class="row flex-column align-items-center">
                <div class="mb-3 col-4">
                    <label for="city" class="form-label">City:</label>
                    <input type="text" class="form-control" id="city" name="city" />
                </div>
                
                <div class="mb-3 col-4">
                    <label for="pincode" class="form-label">Pincode:</label>
                    <input type="text" class="form-control" id="pincode" name="pincode" />
                </div>
                <div class="mb-3 col-4">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" />
                </div>
                <div class="mb-3 col-4">
                    <label for="address" class="form-label">Address:</label>
                    <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                </div>
                
                <div class="text-center col-4">
                    <button type="reset" class="btn btn-subtle me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Add New Address</button>
                </div>
            </div>
        </form>
        
        @if(session('success'))
            @if(session('success') == true)
                <div class="alert alert-success">
                    <p>Address added successfully.</p>
                </div>
            @else
                <div class="alert alert-danger">
                    <p>Address creation failed.</p>
                </div>
            @endif
        @endif
    </div>
@endsection