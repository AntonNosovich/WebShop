@extends('admin.layouts.main')
@section('content')
    <main class="main js-main">
        <h1 class="user-info"> Advertising Settings </h1>
        <div class="block-left">
        <div class="form-container">
            <h1 class="menu-name">Advertising List</h1>
            <div class="wrapper">
                <div class="items">
                    @foreach($advertisings as $tool)
                        <div class="items__item">
                            <div class="items__item-name">
                                            <div><h2>@if ($tool->category_id == 0) Main @else {{$tool->category->name}}@endif</h2></div>
                                        </div>
                                        <div class="items__item-buttons">
                                            <div>
                                                <form action="{{ route( 'advertising.edit',$tool['id'])}}" method="GET">
                                                    @csrf
                                                    <button class="items__item-buttons__change">change</button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('advertising.destroy',$tool['id'])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="items__item-buttons__delite">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
        </div>
        </div>

        <div class="block-right">
            <div class="form-container menu-tool">
                <h1 class="menu-name">{{$title}}</h1>
                <form  method="POST"   action="{{$route}}"  class="form" enctype="multipart/form-data">
                    @csrf
                    @method($method)
              <div class="form__inputrow">
                <label class="form__label" for="">Category:</label>
                <select class="form__input dynamic" name="category_id" id="category_id" data-dependent-child="item_child_id" data-dependent = "item_id">
                    @if ($method == "POST")
                        <option class="form__input" value="" >Select Category</option>

                    @endif
                        <option class="form__input" value="0" >Main</option>
                    @foreach($tools as $tool)
                        @if($method=='PUT')
                            <option class="form__input"  @if($advertising->category_id == $tool->id) selected @endif value="{{$tool->id}}">{{$tool->name}}</option>
                        @else
                            <option class="form__input" value="{{$tool->id}}" >{{$tool->name}}</option>
                                @endif
                        @foreach($tool->child as $item)
                                <option class="form__input" value="{{$item->id}}" >{{$item->name}}</option>

                            @endforeach

                    @endforeach
                </select>
                  @error('category_id')
                  <p class="text-red-500">{{$message}}</p>
                  @enderror
              </div>
                    <div class="form__inputrow form_group" >
                <label class="form__label" for="">Item:</label>
                <select class="form__input" name="item_id" id="item_id" data-dependent = 'category_id'>
                    @if($method=='PUT')
                        <option class="form__input" value="{{$advertising->item_id}}" selected>{{$advertising->item->article}}</option>
                    @else
                    <option value="">Select item</option>
                      @endif
                </select>
                 @csrf
                        @error('item_id')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form__inputrow form_group" >
                <label class="form__label" for="">Child Item:</label>
                        <select class="form__input" name="item_child_id" id="item_child_id" data-dependent = 'category_id'>
                            @if($method=='PUT')
                                <option class="form__input" value="{{$advertising->child_item_id}}" selected>{{$child->article}}</option>
                            @else
                                <option value="">Select item</option>
                            @endif
                        </select>
                        @csrf

                    </div>

                    <div class="form__inputrow">
                        <label class="form__label" for="">Big Banner:</label>
                        @if($method =='PUT' )
                            @foreach($advertising->images as $image)
                                <p><img class="nav__list-link-icon" src="{{asset('/storage/' .$image->url)}}" alt=""></p>
                            @endforeach
                        @endif
                        <input class="form__input" accept="image/jpg, image/svg, image/png, image/jpeg" type="file" name="image[]" multiple>
                        @error('image')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form__inputrow">
                        <label class="form__label" for="">Small Image:</label>
                        @if($method =='PUT' )
                                <p><img class="nav__list-link-icon" src="{{asset('/storage/' .$advertising->child_img)}}" alt=""></p>
                        @endif
                        <input class="form__input" name="child_image" type="file" >
                    </div>
                    <div class="form__inputrow">
                        <label class="form__label" for="">Active:</label>
                        <label class="switch">
                            <input type="hidden" name="active" value="0" >
                            <input type="checkbox" name="active" value="1" @if($method=='PUT'&& $advertising->is_active==1) checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>

                @if($method=="POST")
                        <button class=" form__btn-send send " type="submit" >create</button>
                    @else
                        <button class="form__btn-send send" type="submit" >change</button>
                    @endif
                    <button class="form__btn-clean" type="reset">clear</button>
                </form>
            </div>
        </div>
    </main>
@endsection
