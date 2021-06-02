@extends('dashboard.master')

@section('content')

<form action="{{ route( "category.update",$category->id )}}" method="post">
    @method('put')
    @include('dashboard.category._form')
</form>

@endsection