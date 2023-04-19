@extends('layouts.layout')
@section('content')
    <div class="body">
        <form method="POST" action="{{route('postLogin')}}">
        @csrf
            <div class="email">
                <span class="email__txt">Email</span>
                <input class="email__input" value="{{ Request::old('email') }}"name="email" type="email">
            </div>
            @error('email')
              <div>
            <p class="error"> {{$message}} </p>
                 </div>
         @enderror
            <div class="password">
                <span class="password__txt">Password</span>
                <input class="password__input" name="password" type="password">
            </div>
            <div class="action">
                <div>
                    <input class="action__check" type="checkbox" value="" id="flexCheckChecked" name="remember_me">
                    <label class="action__txt" for="flexCheckChecked">
                        Remember me
                    </label>
                </div>
                <button class="action__btn1" type="submit">Send</button>
                <div>
                    <a class="action__create-account" href="{{route('register')}}">Create account</a>
                </div>
            </div>

        </form>
    </div>
 @endsection
