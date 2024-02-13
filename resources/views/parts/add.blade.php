@extends('layouts.base')

@section('title', 'Part :: Create')

@section('main')

<form action="{{route('parts.store')}}" method="POST">
    @csrf

    <label for="name">name</label>
    <input type="text" name="name" id="name" value="{{old('name')}}">
    @error('name')<span>{{$message}}</span>@enderror('name')

    <br><br>

    <label for="desc">desc</label>
    <textarea name="desc" id="desc" cols="30" rows="10">{{old('desc')}}</textarea>

    <br><br>

    <input type="submit" value="Store">
</form>
@endsection('main')