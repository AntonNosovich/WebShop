@extends('admin.layouts.main')
@section('content')
    <main class="main js-main">
        <h1 class="user-info">Menu Settings </h1>
        <div class="block-left">
            <div class="form-container">
                <h1 class="menu-name">Tools List</h1>
                <div class="wrapper">
                    <div class="items">
                        @foreach($menus as $tool)
                            <div class="items__item">
                                <div class="items__item-name">
                                    <div class="items__item__img"><img class="items__item__img-item" src="{{asset('/storage/' .$tool->image)}}" ></div>
                                    <div><h2>{{$tool->name}}</h2></div>
                                </div>
                                <div class="items__item-buttons">
                                    <div>
                                        <form action="{{ route( 'menus.edit',$tool['id'])}}" method="GET">
                                            @csrf
                                            <button class="items__item-buttons__change">change</button>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="{{ route('menus.destroy',$tool['id'])}}" method="POST">
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

                <form method="POST" action="{{$action}}" class="form" enctype="multipart/form-data">

                    @csrf
                    @method($method)


                    <div class="form__inputrow">
                        <label class="form__label" for="">Name:</label>
                        <input class="form__input" value="{{$menu->name ?? Request::old('name')}}" type="text"
                               name="name" placeholder="input name">

                    </div>
                    @error('name')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <div class="form__inputrow">
                        <label class="form__label" for="">Route:</label>
                        <input class="form__input" name="route" value="{{$menu->route ?? Request::old('route')}}"
                               type="text" placeholder="input URL">

                    </div>
                    @error('route')

                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <div class="form__inputrow">
                        <label class="form__label" for="">IMG:</label>
                        @if($method == 'PUT')

                            <img class="nav__list-link-icon" src="{{asset('/storage/' .$menu->image)}}" alt="">
                            <input class="form__input" accept="image/jpg, image/svg, image/png, image/jpeg" type="file" name="image">

                        @else
                            <input class="form__input" accept="image/jpg, image/svg, image/png, image/jpeg" type="file" name="image">
                        @endif
                    </div>
                    @error('image')
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <div class="form__inputrow">
                        <label class="form__label" for="">Role:</label>
                        <select class="form__input" name="role" value=" ">
                            @foreach($roles as $role)
                                @if($method == 'PUT')
                                    <option class="form__input" @if($menu->hasRole($role))    value="{{$role}}"
                                            selected @endif >{{$role}}</option>
                                @else
                                    <option class="form__input" value="{{$role}}" selected>{{$role}}</option>
                                @endif

                            @endforeach

                        </select>

                    </div>

                    <button class="form__btn-send send" type="submit">{{$button}}</button>
                    <button class="form__btn-clean" type="reset">clear</button>
                </form>
            </div>
        </div>

    </main>
@endsection
