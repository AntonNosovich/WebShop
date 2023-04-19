@extends('admin.layouts.main')
@section('content')
    <main class="main js-main">
        <h1 class="user-info">{{$title}}</h1>
        <div class="form-container">
            <form class="form" action="{{$action}}" method="POST"  >
                @csrf
                @method($method)
                <div class="form__inputrow">
                    <label class="form__label" for="">Product:</label>
                        <select  class="form__input" name="product" value="fuck">
                            @foreach($productShow as $product)
                                    <option  value="{{$product->id}}" @if($method == 'PUT') @if ($item->product_id  == $product->id) selected @endif @endif>id:{{$product->id}} {{$product->name}}</option>
                            @endforeach
                        </select>
                        @error('product')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Article:</label>
                    <input class="form__input" type="text" placeholder="input article" name="article" value="{{$item->article ?? Request::old('article')}}">
                    @error('article')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="form__inputrow">
                    <div class="counter-wrap">
                        <label class="form__label" for="">Quantity:</label>
                        @if($method=='PUT')
                        <button class ="count" @if($item->quantity == 0)disabled @endif>-</button>
                            <input type="hidden" name="quantity" class="input_quantity" value="{{$item->quantity}}">
                            <b id="counter-label" class="counter-label">{{$item->quantity}}</b>
                            <button class ="count" >+</button>
                        @else
                            <button class ="count" disabled>-</button>
                        <input type="hidden" name="quantity" class="input_quantity" value="0">
                        <b id="counter-label" class="counter-label"> 0 </b>
                            <button class ="count" >+</button>
                        @endif
                    </div>
                    <div class="counter-wrap">
                        @if($method == 'PUT')
                        <label class="form__label" for="">Sale:</label>
                        <button class ="count count_sale"@if($item->sale == 0) disabled @endif>-</button>
                        <input type="hidden" name="sale" class="input_sale"   value="0" >
                        <b id="counter-label" class="counter-label sale"> {{$item->sale}} </b><span class="procent">%</span>
                        <button class ="count count_sale" >+</button>
                           @else
                            <label class="form__label" for="">Sale:</label>
                            <button class ="count count_sale" disabled>-</button>
                            <input type="hidden" name="sale" class="input_sale"   value="0" >
                            <b id="counter-label" class="counter-label sale"> 0 </b><span class="procent">%</span>
                            <button class ="count count_sale" >+</button>
                    @endif
                    </div>
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Size:</label>
                    <input class="form__input" type="text" placeholder="input size" name="size" value="{{$item->size ?? Request::old('size')}}">
                    @error('size')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <button class="form__btn-send send" type="submit" onclick="" >send</button>
                <button class="form__btn-clean" type="reset">clear</button>
            </form>
        </div>
    </main>
@endsection
