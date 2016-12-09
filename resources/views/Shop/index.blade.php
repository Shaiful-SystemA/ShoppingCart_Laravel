
@extends('Layout.master')

@section('title')
    Shoppinng Cart
@endsection

@section('content')
  @if(Session::has('success')
  <div class="row">
      
      <div "col-sm-6 col-md-4 col-md-offset-4  col-sm-offset-3">
          <div id="charge-message" class="alert alert-success">
            
            {{Session::get('success')}}
          </div>
        
      </div>
      
  </div>

  @endif
  @foreach($products->chunk(3) as $productChunk)
<div class="row">
  @foreach($productChunk as $product)
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{  $product->imagepath }}" alt="..." class="img-responsive">
      <div class="caption">
        <h3>{{ $product-> title}}</h3>
        <p class="description">
            {{$product-> description}}         
        </p>
        <div class = "clearfix" >
            <div class="pull-left price">${{ $product->price}} </div>
            <a href="{{ route('product.addToCart', ['id' => $product->id] ) }}" class="btn btn-success pull-right" role="button">Button</a>
         </div>
      </div>
    </div>
  </div>
  @endforeach
  </div>  
  @endforeach
  @endsection
  
  
  
  http://childrensbookalmanac.com/wp-content/uploads/Harry-Potter.png