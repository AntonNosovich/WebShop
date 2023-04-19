@extends('admin.layouts.main')
@section('content')
    <main class="main js-main">
        <h1 class="user-info">{{$title}} </h1>

            <table class="content-table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Name</th>
                    <th>Guard</th>
                    <th>Created at</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key => $role)
                    <tr>
                        <td> {{$key+1}}</td>

                        <td>{{$role->name}}</td>
                        <td>{{$role->guard_name}}</td>
                        <td>{{$role->created_at}}</td>

                        <th>
                            <details>
                                <summary></summary>
                                <summary>

                                    <form action="{{ route( 'roles.edit',$role['id'])}}" method="GET">
                                        @csrf
                                        <button class="content-table__btn-change">change</button>
                                    </form>
                                </summary>
                                <summary>
                                <form action="{{ route('roles.destroy',$role['id'])}}" method="POST">
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
