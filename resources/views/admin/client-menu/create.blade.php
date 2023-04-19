@extends('admin.layouts.main')
@section('content')
    <main class="main js-main">
        <h1 class="user-info">Client-Menu Settings </h1>
        <div class="block-left">

            <div class="form-container">
                <h1 class="menu-name">Tools List</h1>
                <div class="acor-container">
                    @foreach($tools as $tool)
                    <input type="checkbox" name="chacor" id="{{$tool->id}}" checked="checked" />
                    <label for="{{$tool->id}}">{{$tool->name}}
                        <div>
                            <form action="{{ route( 'client-menu.edit',$tool['id'])}}" method="GET">
                                @csrf
                                <button class="items__item-buttons__change">change</button>
                            </form>
                            <form action="{{ route('client-menu.destroy',$tool['id'])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="items__item-buttons__delite">Delete</button>
                            </form>
                        </div>
                    </label>
                    <div class="acor-body">
                        @foreach($tool->child as $item)
                        <p>{{$item->name}}</p>
                        <div>
                            <form action="{{ route( 'client-menu.edit',$item['id'])}}" method="GET">
                                @csrf
                                <button class="items__item-buttons__change">change</button>
                            </form>
                            <form action="{{ route('client-menu.destroy',$item['id'])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="items__item-buttons__delite">Delete</button>
                                </form>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
        </div>
        </div>

        <div class="block-right">
            <div class="form-container menu-tool">

                <h1 class="menu-name">{{$title}}</h1>
                <form  method="POST"   action="{{$route}}"  class="form">
                    @csrf
                    @method($method)

                    <div class="form__inputrow">
                    <label class="form__label" for="">Name:</label>

                    <input class="form__input"  value="{{$clientMenu->name ?? Request::old('name')}}" type="text" name="name" placeholder="input name">

                    @error('name')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="form__inputrow">
                    <label class="form__label" for="">URL:</label>

                    <input class="form__input"  value="{{$clientMenu->slag ?? Request::old('slag')}}" type="text" name="slag" placeholder="input URL">

                    @error('URL')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>

                    <div class="form__inputrow">
                    <label class="form__label" for="">Active:</label>
                    <label class="switch">
                        <input type="hidden" name="active" value="0" >
                        <input type="checkbox" name="active" value="1" @if($method=='PUT'&& $clientMenu->active==1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                    <label class="form__label" for="">New:</label>
                    <label class="switch">
                        <input type="hidden" name="is_new" value="0">
                        <input type="checkbox" name="is_new" value="1"@if($method=='PUT'&& $clientMenu->is_new==1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="form__inputrow">


                    <label class="form__label" for="">Parent Tool:</label>
                    <select class="form__input" name="parent_id" >
                                <option class="form__input" value="0">None</option>
                                 @foreach($parents as $parent)
                            @if($method=='PUT')
                            <option class="form__input"  @if($clientMenu->parent_id == $parent->id) selected @endif value="{{$parent->id}}">{{$parent->name}}</option>
                        @else
                                <option class="form__input" value="{{$parent->id}}" >{{$parent->name}}</option>
                        @endif
                        @endforeach
                    </select>
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
