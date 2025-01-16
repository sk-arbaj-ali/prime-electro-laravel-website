@extends('MasterLayout')

@section('styles')
<style>
      /*===========================
    card-01 css
  ===========================*/
  .single-card {
    box-shadow: var(--shadow-1);
    border-radius: 8px;
    overflow: hidden;
    margin-top: 30px;
    -webkit-transition: all 0.3s ease-out 0s;
    -moz-transition: all 0.3s ease-out 0s;
    -ms-transition: all 0.3s ease-out 0s;
    -o-transition: all 0.3s ease-out 0s;
    transition: all 0.3s ease-out 0s;
  }
  .single-card:hover {
    box-shadow: var(--shadow-4);
  }
  .single-card .card-image img {
    width: 100%;
    height: 100%;
  }
  .single-card .card-content {
    padding: 16px;
  }
  .single-card .card-content .card-title {
    margin-bottom: 0;
  }
  .single-card .card-content .card-title a {
    color: var(--black);
    -webkit-transition: all 0.3s ease-out 0s;
    -moz-transition: all 0.3s ease-out 0s;
    -ms-transition: all 0.3s ease-out 0s;
    -o-transition: all 0.3s ease-out 0s;
    transition: all 0.3s ease-out 0s;
  }
  .single-card .card-content .card-title a:hover {
    color: var(--primary);
  }
  .single-card .card-content .text {
    color: var(--dark-3);
    margin-top: 8px;
  }
</style>
@endsection

@section('main_content')

<section class="container">
    @if($laptops->isNotEmpty())
    <div>
        <h2 class="text-center">Trending Laptops...</h2>
    </div>
    <div class="row justify-content-center">
        @foreach($laptops as $product)
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
    @endif

    @if($smartphones->isNotEmpty())
    <div class="my-3">
        <h2 class="text-center">Trending Smartphones...</h2>
    </div>
    <div class="row justify-content-center">
        @foreach($smartphones as $product)
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
    @endif

    @if($desktops->isNotEmpty())
    <div class="my-3">
        <h2 class="text-center">Trending Desktops...</h2>
    </div>
    <div class="row justify-content-center">
        @foreach($desktops as $product)
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
    @endif
</section>

@endsection