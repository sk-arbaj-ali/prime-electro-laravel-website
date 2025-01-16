@extends('MasterLayout')

@section('main_content')
<div class="container">
    <h3 class="text-center fst-italic text-decoration-underline">All Added Products</h3>
<div class="row justify-content-center">
        @if(session('success'))
            @if(session('success') == true)
                <div class="alert alert-success">
                    <p>Product edited successfully.</p>
                </div>
            @else
                <div class="alert alert-danger">
                    <p>Product not edited.</p>
                </div>
            @endif
        @endif
        @if(session('deleted') == true)
            <div class="alert alert-success">
                <p>Product deleted successfully.</p>
            </div>
        @endif
    @if($products->isEmpty())
    <h3 class="text-center my-3">No product available. Lets add some product for sale.</h3>
    @endif
    @foreach($products as $product)
    <div class="col-8 col-lg-3 my-3">
        <div class="card">
            <img src="{{ asset('/storage/' . $product->image_path) }}" class="card-img-top img-thumbnail" alt="Fissure in Sandstone"/>
            <div class="card-body">
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <p class="card-text">{{ $product->product_price }}</p>
                <p class="card-text">Product created: {{ $product->created_at }}</p>
                <div class="d-flex justify-content-evenly">
                    <a href="{{ route('edit-product-for-seller',['product_id'=>$product->id]) }}" class="btn btn-info"><i class="fa-solid fa-pencil"></i>Edit</a>
                    <form action="{{ route('delete-product-data') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection