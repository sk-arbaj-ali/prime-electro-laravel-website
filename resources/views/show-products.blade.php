@extends('MasterLayout')

@section('main_content')
<section class="container">
    <div>
        <h2 class="text-center">Trending {{ $category->name . 's'}}...</h2>
    </div>
    <div class="row justify-content-center">
        @foreach($products as $product)
        <div class="col-9 col-lg-3 my-2">
            <div class="card my-2 h-100">
                <img src="{{ asset('/storage/' . $product->image_path) }}" class="card-img-top" alt="image" />
                <div class="card-body">
                    <h4>{{ $product->product_name }}</h4>
                    <p class="card-text">
                        {{ $product->description }}
                    </p>
                    <div class="d-flex justify-content-evenly align-items-center">
                        <p>Price: {{ $product->product_price }}</p>
                        <a class="btn btn-primary" href="{{ route('show-specific-product',['id'=> $product->id]) }}">See More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-6 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection