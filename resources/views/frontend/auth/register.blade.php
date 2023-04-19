@extends('layouts.layout')
@section('content')
<form method="POST" action="{{route('postRegister')}}">
@csrf
    <div style="margin: 10px">
        <span>Name</span><input name="name" type="text" value="{{ Request::old('name') }}">

    </div>
    @error('name')
     <div>
    <p class="text-red-500">{{$message}}</p>
     </div>
         @enderror
    <div style="margin: 10px">
        <span>Last Name</span><input name="lastname" type="text" value="{{ Request::old('lastname') }}">
    </div>
    @error('lastname')

    <p class="text-red-500">{{$message}}</p>
    @enderror
    <div style="margin: 10px">
        <span>Address</span><input name="address" type="text" value="{{ Request::old('address') }}">
        @error('address')

        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <div style="margin: 10px">
        <span>email</span>
        <input name="email" type="email" value="{{ Request::old('email') }}">
        @error('email')

        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <div style="margin: 10px">
        <span>password</span>
        <input name="password" type="password">
        @error('password')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <div style="margin: 10px">
        <span>Confirm password</span>
        <input name="password_confirmation" type="password">
        @error('password_confirmation')

        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <button type="submit"  class="btn-primary btn" >Send</button>
    <div><a href="{{route('login')}}">Sign in</a></div>

</form>
@endsection
