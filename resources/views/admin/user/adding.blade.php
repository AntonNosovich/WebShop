@extends('admin.layouts.main')
@section('content')
    <main class="main js-main">
        <h1 class="user-info">{{$title}} </h1>
        <div class="form-container">
            <form  method="POST"   action="{{$action}}"  class="form">

                @csrf
                @method($method)
                <div class="form__inputrow">
                    <label class="form__label" for="">Name:</label>
                    <input class="form__input" value="{{$user->name ?? Request::old('name')}}"  type="text" name="name" placeholder="input name">

                </div>
                @error('name')

                <p class="text-red-500">{{$message}}</p>
                @enderror
                <div class="form__inputrow">
                    <label class="form__label" for="">Lastname:</label>
                    <input class="form__input" value="{{$user->lastname ?? Request::old('lastname')}}"  type="text" name="lastname" placeholder="input lastname">

                </div>
                @error('lastname')
                <p class="text-red-500">{{$message}}</p>
                @enderror
                <div class="form__inputrow">
                    <label class="form__label" for="">Address:</label>
                    <input class="form__input" name="address" value="{{$user->address ?? Request::old('address')}}"  type="text" placeholder="input address">

                </div>
                @error('address')

                <p class="text-red-500">{{$message}}</p>
                @enderror
                <div class="form__inputrow">
                    <label class="form__label" for="">Role:</label>
                   <select class="form__input" name="role" value="fuck">
{{--                                         как передать роль--}}
                       @foreach($roles as $role)
                           @if($method == 'PUT')
                           <option class="form__input" @if($user->hasRole($role))    value= "{{$role}}"  selected @endif >{{$role}}</option>
                           @else
                               <option class="form__input"   value= "{{$role}}" selected >{{$role}}</option>
                           @endif

                               @endforeach

                    </select>

                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Email:</label>
                    <input class="form__input" name="email" value="{{$user->email ?? Request::old('email')}}"  type="email" placeholder="input email">

                </div>
                @error('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror
                @if($method=='POST')
                <div class="form__inputrow">
                    <label class="form__label" for="">Password:</label>
                    <input class="form__input" name="password" type="password" placeholder="input password">
                </div>
                @error('password')
                <p class="text-red-500">{{$message}}</p>
                    @enderror
                <div class="form__inputrow">
                    <label class="form__label" for="">Confirm Password:</label>
                    <input class="form__input" name="password_confirmation" type="password" placeholder="input password">
                    @error('password_confirmation')

                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                @endif
                <button class="form__btn-send send" type="submit" >send</button>

                <button class="form__btn-clean" type="reset">clear</button>
            </form>
        </div>
    </main>
@endsection
