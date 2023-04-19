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
                    <input class="form__input" type="text" placeholder="input name" name="name" value="{{$product->name}}">
                    @error('name')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="form__inputrow">
                    <label class="form__label" for="">Description:</label>
                    <textarea  type="" class="form__input"  style="width: 264px; height: 110px;"  name="description" placeholder="write description" value="{{$product->description}}">{{$product->description}}</textarea>
                    @error('description')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="form__inputrow">
                    <label class="form__label" for="">Price:</label>
                    <input  name="price" class="form__input" type="text" placeholder="input price in $" value="{{$product->price}}">
                    @error('price')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>


                <div class="form__inputrow">
                    <label class="form__label" for="">Image:</label>
                    @foreach($product->images as $image)
                        <p><img class="nav__list-link-icon" src="{{asset('/storage/' .$image->url)}}" alt=""></p>
                    @endforeach
                        <input class="form__input" accept="image/jpg, image/svg, image/png, image/jpeg" type="file" name="image[]" multiple>
                    @error('image')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">Category:</label>
                    <div class="multiselect_block">
                        <label for="select-1" class="field_multiselect">
                            @foreach($product->tools as $tool)
                            <button type="button" class="btn_multiselect">{{$tool->name}}</button>
                            @endforeach
                        </label>
                        <input id="checkbox-1" class="multiselect_checkbox" type="checkbox">
                        <label for="checkbox-1" class="multiselect_label"></label>
                        <select id="select-1" class="field_select" name="category[]" multiple style="@media (min-width: 768px) { height: calc(4 * 38px)}">
                            @foreach($tools as $tool)
                                <optgroup label="{{$tool->name}}">
                                    <option  value="{{$tool->id}}" >{{$tool->name}}</option>
                                @foreach($tool->child as $child)
                                        <option  value="{{$child->id}}" >{{$child->name}}</option>
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
                    <label class="form__label" for="">Available:</label>
                    <label class="switch">
                        <input type="hidden" name="is_available" value="0">
                        <input type="checkbox" name="is_available" value="1" @if($product->is_available == true) checked @endif >
                        <span class="slider round"></span>
                    </label>
                </div>
                <button class="form__btn-send send" type="submit" onclick="">update</button>
                <button class="form__btn-clean" type="reset">clear</button>
            </form>
        </div>
    </main>
@endsection
