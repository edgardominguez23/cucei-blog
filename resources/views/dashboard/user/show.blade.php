@extends('dashboard.master')
@section('content')
    
<div class="form-group">
    <label for="name">Nombre</label>
    <input readonly class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
    @error('name')
        <small class="text-danger">{{ $message}}</small>
    @enderror
</div>
@endsection