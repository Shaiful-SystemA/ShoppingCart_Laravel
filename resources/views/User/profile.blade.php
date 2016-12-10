@extends('Layout.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>User Profile</h1>
        <hr>
        <h2>Your Orders </h2>
        @foreach($orders as $order)
        <div class="panel panel-default">
          <div class="panel-body">
                <ul class="list-group">
                    @foreach($order->cart->items as item)
                  <li class="list-group-item">
                      <span class="badge">{{$item['price']}} $</span>
                  </li>
                    @endforeach
                </ul>
          </div>
          <div class="panel-footer">Panel footer</div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection


