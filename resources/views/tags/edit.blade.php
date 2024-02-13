@extends('layouts.base')

@section('title', 'Tags :: '.$tag->name.' :: Edit')

@section('main')

<form action="{{route('tags.update', ['tag' => $tag->id])}}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">name</label>
    <input type="text" name="name" id="name" value="{{old('name', $tag->name)}}">
    @error('name')<span>{{$message}}</span>@enderror('name')

    <br><br>

    <label for="limit">limit</label>
    <input type="number" name="limit" id="limit" value="{{old('limit', $tag->limit)}}">
    @error('limit')<span>{{$message}}</span>@enderror('limit')

    <br><br>

    <label for="desc">desc</label>
    <textarea name="desc" id="desc" cols="30" rows="10">{{old('desc', $tag->desc)}}</textarea>

    <br><br>

    <input type="submit" value="Update">
</form>
@endsection('main')