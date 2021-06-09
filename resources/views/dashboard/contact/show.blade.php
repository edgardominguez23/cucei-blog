@extends('dashboard.master')
@section('content')
    
@csrf

<div class="form-group">
    <label for="title">Nombre</label>
    <input readonly class="form-control" type="text" value="{{ $contact->name }}">
</div>
<div class="form-group">
    <label for="url_clean">Email</label>
    <input readonly class="form-control" type="text" value="{{ $contact->email }}">
</div>
<div class="form-group">
    <label for="content">Contenido</label>
    <textarea readonly class="form-control" row="3">{{ $contact->commentary }}</textarea>
</div>
@endsection