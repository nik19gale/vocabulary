@extends('layouts.base')

@section('title', 'Words :: Create')

@section('main')

<form action="{{route('words.store')}}" method="POST">
    @csrf

    <label for="alpha">alpha</label>
    <input type="text" name="alpha" id="alpha" value="{{old('alpha')}}">
    @error('alpha')<span>{{$message}}</span>@enderror('alpha')

    <br><br>

    <label for="beta">beta</label>
    <input type="text" name="beta" id="beta" value="{{old('beta')}}">
    @error('beta')<span>{{$message}}</span>@enderror('beta')

    <br><br>

    <label for="part_id">part</label>
    <select name="part_id" id="part_id">
        @foreach($parts as $part)
            <option value="{{$part->id}}">{{$part->name}}</option>
        @endforeach
    </select>

    <br><br>

    <label for="tag_id">tag</label>
    <select name="tag_id" id="tag_id">
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>

    <br><br>

    <input type="submit" value="Store">
</form>
@endsection('main')