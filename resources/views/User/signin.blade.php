@extends('Layout.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign In</h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error}}</p>
              @endforeach
        </div>
        @endif
        <form action=""{{ route('User.signin') }} method="post">
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control"/>
            </div>
                <div class="form-group">
                <label for="password">password</label>
                <input type="password" id="password" name="password" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
            {{csrf_field()}}
        </form>
        <P>Dont have an account?<a href="{{route('User.signup')}} ">Sign up instead </a></P>
    </div>
    
</div>
@endsection