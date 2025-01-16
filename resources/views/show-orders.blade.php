@extends('MasterLayout')

@section('main_content')
<div class="container">
    <h3 class="text-center fst-italic text-decoration-underline">Order Details</h3>
@if(session('status'))
    <div class="alert alert-info">
        <p>{{ session('status') }}</p>
    </div>
@endif
<div class="row justify-content-center">
    @if($orders->isEmpty())
        <h3 class="text-center my-3">No order available. Lets make some purchase.</h3>
    @else
        @foreach($orders as $order)
        <div class="col-8 col-lg-3 my-3">
            <div class="card">
                <img src="{{ asset('/storage/' . $order->product->image_path) }}" class="card-img-top img-thumbnail" alt="Fissure in Sandstone"/>
                <div class="card-body">
                    <h5 class="card-title">{{ $order->product->product_name }}</h5>
                    <p class="card-text">{{ $order->product->product_price }}</p>
                    <p class="card-text">Order submitted: {{ $order->created_at }}</p>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
</div>
@endsection