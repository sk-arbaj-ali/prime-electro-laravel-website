@extends('MasterLayout')

@section('main_content')
<div class="container">
<div class="row justify-content-center">
    @if($addresses->isEmpty())
        <div class="col-4">
            <h3>No address available. Please add a new address.</h3>
        </div>
    @endif
    @foreach($addresses as $address)
    <div class="col-lg-4 my-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">{{$address->city}}</h5>
                <ul>
                    <li class="card-text">{{$address->address}}</li>
                    <li class="card-text">{{$address->pincode}}</li>
                    <li class="card-text">{{$address->phone}}</li>
                </ul>
                <form action="{{ route('remove-address') }}" method="post">
                    @csrf
                    <input type="hidden" name="address_id" value="{{$address->id}}" />
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Remove</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row justify-content-center">
    <div class="col-4 text-center">
        <a href="{{ route('show-address-form') }}" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">
            Add new address
        </a>
    </div>
</div>
</div>
@endsection