<!DOCTYPE html>
<html lang="en">
<head>
    @php
    use App\Models\Menu;
        $menus=Menu::orderByDesc('id')->get();
    @endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/addUsersStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client-menuSettingsStyle.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>
<body>
<div class="wrapper">
    <sidebar class="side js-side">
        <div class="side__wrapper">
            <!-- header -->
            <div class="side__header">


                <button class="side-toggle js-side-toggle"><svg id="Capa_1" enable-background="new 0 0 464.205 464.205" viewBox="0 0 464.205 464.205" xmlns="http://www.w3.org/2000/svg"><g><g id="grip-solid-horizontal_1_"><path d="m435.192 406.18h-406.179c-16.024 0-29.013-12.99-29.013-29.013s12.989-29.013 29.013-29.013h406.18c16.023 0 29.013 12.99 29.013 29.013-.001 16.023-12.99 29.013-29.014 29.013z"/><path d="m435.192 261.115h-406.179c-16.024 0-29.013-12.989-29.013-29.012s12.989-29.013 29.013-29.013h406.18c16.023 0 29.013 12.989 29.013 29.013s-12.99 29.012-29.014 29.012z"/><path d="m435.192 116.051h-406.179c-16.024 0-29.013-12.989-29.013-29.013s12.989-29.013 29.013-29.013h406.18c16.023 0 29.013 12.989 29.013 29.013s-12.99 29.013-29.014 29.013z"/></g></g></svg></button>
                <img  class="logo" src="{{asset('/storage/logo.png')}}">

                <a class="email__logo-txt" href="#">
                    @php($user=auth()->user())
                    {{$user['email']}}
                </a>
            </div>


            <!-- header -->

            <!-- nav -->
            <nav class="nav">
                <div class="nav__list">

                    @foreach($menus as $tool)
                    <li class="nav__list-item">

                        <a href="{{route($tool->route)}}" class="nav__list-link">
                            @isset($tool->image)
                            <img  class="nav__list-link-icon" src="{{asset('/storage/' . $tool->image)}}">
                            @endisset
                                <span class="nav__list-link-txt">{{$tool->name}}</span>
                        </a>
                    </li>
                    @endforeach
                </div>
            </nav>
            <!-- nav -->

            <div class="side__footer">
                <a href="{{route('AdminpostLogout')}}" class="logout-link">
                    <svg class="logout-link__icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><g><path d="M330.667,384h-21.333c-5.891,0-10.667,4.776-10.667,10.667v74.667h-256V42.667h256v74.667 c0,5.891,4.776,10.667,10.667,10.667h21.333c5.891,0,10.667-4.776,10.667-10.667V42.667C341.333,19.103,322.231,0,298.667,0h-256 C19.103,0,0,19.103,0,42.667v426.667C0,492.898,19.103,512,42.667,512h256c23.564,0,42.667-19.102,42.667-42.667v-74.667 C341.333,388.776,336.558,384,330.667,384z"/><path d="M508.542,248.135l-128-117.333c-3.125-2.844-7.656-3.625-11.5-1.896c-3.875,1.698-6.375,5.531-6.375,9.76V160 c0,3.021,1.281,5.906,3.531,7.927l74.151,66.74H138.667c-5.896,0-10.667,4.771-10.667,10.667v21.333 c0,5.896,4.771,10.667,10.667,10.667h301.682l-74.151,66.74c-2.25,2.021-3.531,4.906-3.531,7.927v21.333 c0,4.229,2.5,8.063,6.375,9.76c1.375,0.615,2.844,0.906,4.292,0.906c2.615,0,5.198-0.969,7.208-2.802l128-117.333 C510.75,261.844,512,258.99,512,256S510.75,250.156,508.542,248.135z"/></g></g></g></svg>
                    <span class="logout-link__txt">Logout</span>
                </a>
            </div>
        </div>
    </sidebar>
    @yield('content')

</div>
<script src={{asset('js/AddUsers.js') }}></script>
<script src={{asset('js/btn.js') }}></script>
<script src={{asset('js/counter.js') }}></script>
<script src={{asset('js/jquery.nestable.js') }}></script>
<script src={{asset('js/getJSvalue.js') }}></script>

</body>
</html>
