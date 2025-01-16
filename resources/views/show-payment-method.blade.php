@extends('MasterLayout')

@section('main_content')
<div class="container">
<div class="row justify-content-center">
    
    <div class="col-lg-4 my-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Payment Method</h5>
                <ul>
                    <li class="card-text">Only COD is available.</li>
                </ul>
                <form action="{{ route('handle-orders') }}" method="post" class="text-center">
                    @csrf
                    <input type="hidden" name="address_id" value="{{$address->id}}" />
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Select COD</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
</div>
@endsection