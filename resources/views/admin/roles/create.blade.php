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

                    <input class="form__input"  value="{{$tool->name ?? Request::old('name')}}" type="text" name="name" placeholder="input name">

                    @error('name')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>


                @if($method=="POST")
                <button class="form__btn-send send" type="submit" >create</button>
                @else
                    <button class="form__btn-send send" type="submit" >change</button>
                @endif
                    <button class="form__btn-clean" type="reset">clear</button>
            </form>
        </div>
    </main>
@endsection
