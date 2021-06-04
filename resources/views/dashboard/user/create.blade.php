@extends('dashboard.master')

@section('content')

<form action="{{ route( "user.store" )}}" method="post">

@include('dashboard.user._form',['pasw' => true])

</form>

@endsection