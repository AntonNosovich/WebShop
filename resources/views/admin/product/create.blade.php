@extends('admin.layouts.main')
@section('content')
    <main class="main js-main">
        <h1 class="user-info">{{$title}}</h1>
        <div class="form-container">
            <form class="form" action="{{$action}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method($method)
                <div class="form__inputrow">
                    <label class="form__label" for="">Name:</label>
                    <input class="form__input" type="text" placeholder="input name" name="name" value="{{Request::old('name')}}">
                    @error('name')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="form__inputrow">
                    <label class="form__label" for="">Description:</label>
                    <textarea  type="" class="form__input"  style="width: 264px; height: 110px;"  name="description" placeholder="write description" value="{{Request::old('description')}}"></textarea>
                    @error('description')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="form__inputrow">
                    <label class="form__label" for="">Price:</label>
                    <input  name="price" class="form__input" type="text" placeholder="input price in $" value="{{Request::old('price')}}">
                    @error('price')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Article:</label>
                    <input class="form__input" type="text" placeholder="input article" name="article" value="{{Request::old('article')}}">
                    @error('article')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="form__inputrow">
                    <div class="counter-wrap">
                        <label class="form__label" for="">Quantity:</label>
                        <button class ="count" disabled>-</button>
                        <input type="hidden" name="quantity" class="input_quantity" value="0">

                        <b id="counter-label" class="counter-label">0</b>
                        <button class ="count" >+</button>
                    </div>
                    <div class="counter-wrap">
                        <label class="form__label" for="">Sale:</label>
                        <button class ="count count_sale" disabled>-</button>
                        <input type="hidden" name="sale" class="input_sale" value="0">
                        <b id="counter-label" class="counter-label sale">0</b><span class="procent">%</span>
                        <button class ="count count_sale" >+</button>
                    </div>
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Image:</label>
                    <input class="form__input" name="image[]" type="file" multiple >
                    @error('image')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Category:</label>
                    <div class="multiselect_block">
                        <label for="select-1" class="field_multiselect">Category</label>
                        <input id="checkbox-1" class="multiselect_checkbox" type="checkbox">
                        <label for="checkbox-1" class="multiselect_label"></label>
                        <select id="select-1" class="field_select" name="category[]" multiple style="@media (min-width: 768px) { height: calc(4 * 38px)}">
                            @foreach($tools as $tool)
                                <optgroup label="{{$tool->name}}">
                                <option  value="{{$tool->id}}">{{$tool->name}}</option>
                                @foreach($tool->child as $child)
                                        <option  value="{{$child->id}}">{{$child->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Size:</label>
                    <input class="form__input" type="text" placeholder="input size" name="size" value="{{Request::old('size')}}">
                    @error('size')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Available:</label>
                    <label class="switch">
                        <input type="hidden" name="is_available" value="0" >
                        <input type="checkbox" name="is_available" value="1" checked >
                        <span class="slider round"></span>
                    </label>
                </div>
                <button class="form__btn-send send" type="submit" onclick="">create</button>
                <button class="form__btn-clean" type="reset">clear</button>
            </form>
        </div>
    </main>
@endsection
