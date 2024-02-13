@extends('layouts.base')

@section('title', 'Tags :: Create')

@section('main')

<form action="{{route('tags.store')}}" method="POST">
    @csrf

    <label for="name">name</label>
    <input type="text" name="name" id="name" value="{{old('name')}}">
    @error('name')<span>{{$message}}</span>@enderror('name')

    <br><br>

    <label for="limit">limit</label>
    <input type="number" name="limit" id="limit" value="{{old('limit', 30)}}">
    @error('limit')<span>{{$message}}</span>@enderror('limit')

    <br><br>

    <label for="desc">desc</label>
    <textarea name="desc" id="desc" cols="30" rows="10">{{old('desc')}}</textarea>

    <br><br>

    <input type="submit" value="Store">
</form>
@endsection('main')