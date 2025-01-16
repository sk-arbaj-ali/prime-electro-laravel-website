@extends('MasterLayout')

@section('main_content')
<section>
    <div class="container mx-3 my-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-9 col-lg-4 my-3">
                <img src="{{ asset('/storage/' . $product->image_path) }}" class="card-img-top" alt="image" />
            </div>
            <div class="col-4">
                <h2>{{$product->product_name}}</h2>
                <h3>{{$product->product_price}}</h3>
                <h4>{{$product->available_stock > 0 ? 'Available' : 'Not available'}}</h4>
                <div>
                    <h4>Description</h4>
                    <p>
                        {{$product->description}}
                    </p>
                </div>
                <form action="{{ route('user-cart-details-post') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping mx-3"></i>Add To Cart</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection