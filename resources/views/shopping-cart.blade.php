@extends('MasterLayout')

@section('main_content')

<section class="container">
<div class="container-fluid my-3">
        <div class="row">
            <aside class="col-lg-9">
                @if(session('status'))
                    <div class="alert alert-info">
                        <p>{{session('status')}}</p>
                    </div>  
                @endif
                <div class="card">
                    <div class="table-responsive">
                        @if($exists)
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="{{ asset('/storage/' . $product->image_path) }}" class="img-sm img-thumbnail" width="100"></div>
                                            <figcaption class="info"> <a href="{{ route('show-specific-product',['id'=>$product->id]) }}" class="title text-dark" data-abc="true">{{$product->product_name}}</a>
                                                {{--<p class="text-muted small">SIZE: L <br> Brand: MAXTRA</p>--}}
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <div class="price-wrap"> <var class="price">{{$product->product_price}}</var></div>
                                    </td>
                                    <td class="text-right d-none d-md-block"> 
                                        <form action="{{ route('remove-cart-item')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="btn btn-light">Remove</button>
                                        </form>
                                    </td>
                                            
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="p-3">Cart is empty. Lets do some shopping.🛒</p>
                        @endif
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                {{--
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> <label>Have coupon?</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div>
                --}}
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3">{{$total_price}}</dd>
                        </dl>
                        {{--
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3">- $10.00</dd>
                        </dl>
                        --}}
                        {{--
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>$59.97</strong></dd>
                        </dl>
                        --}}
                        <hr> 
                        <form action="{{ route('select-address-for-payment') }}" method="post">
                            @csrf
                            <input type="hidden" name="select-address" value="make-order" />
                            <button class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> 
                                Make Purchase 
                            </button> 
                        </form>
                        <a href="/" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection