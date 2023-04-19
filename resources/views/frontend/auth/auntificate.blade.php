@extends('layouts.layout')
@section('content')
<div>
    <span>You are in the system</span>
</div>
<div>
    <a href="{{route('postLogout')}}">Exit</a>
</div>
@endsection
