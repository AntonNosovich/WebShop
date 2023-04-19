@extends('admin.layouts.main')
@section('content')
<main class="main js-main">
    <h1 class="user-info">List of Users </h1>
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">filter</button>
        <div id="myDropdown" class="dropdown-content">
            @foreach($roles as $role)
            <a href={{route('sort',$role)}} action='POST' >{{$role}}</a>
            @endforeach
        </div>
        <a href="{{route('users.create')}}">
        <button   class="btn-add" >add</button>
        </a>
    </div>
    <table class="content-table">
        <thead>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Address</th>
            <th>Role</th>
            <th>Email</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $key => $user)
            <tr>
            <td> {{$key+1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->address}}</td>
                <td>@foreach($user->roles as $role) {{$role->name}}@endforeach</td>
            <td>{{$user->email}}</td>
            <th>
                <details>
                    <summary></summary>
                    <summary>
                        <form action="{{ route( 'users.edit',$user['id'])}}" method="GET">
                            @csrf
                            <button class="content-table__btn-change">change</button>
                        </form>
                    </summary>
                    <summary>
                        <form action="{{ route( 'users.destroy',$user['id'])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="content-table__btn-delite">delete</button>
                        </form>
                    </summary>

                </details>
            </th>
        </tr>
@endforeach
        </tbody>
    </table>
</main>
@endsection

