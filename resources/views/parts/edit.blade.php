@extends('layouts.base')

@section('title', 'Parts :: '.$part->name.' :: Edit')

@section('main')

<form action="{{route('parts.update', ['part' => $part->id])}}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">name</label>
    <input type="text" name="name" id="name" value="{{old('name', $part->name)}}">
    @error('name')<span>{{$message}}</span>@enderror('name')

    <br><br>

    <label for="desc">desc</label>
    <textarea name="desc" id="desc" cols="30" rows="10">{{old('desc', $part->desc)}}</textarea>

    <br><br>

    <input type="submit" value="Update">
</form>
@endsection('main')