@extends('layouts.base')

@section('title', 'Words :: '.$word->alpha.'('.$word->part->name.') :: Edit')

@section('main')

<form action="{{route('words.update', ['word' => $word->id])}}" method="POST">
    @csrf
    @method('PUT')

    <label for="alpha">alpha</label>
    <input type="text" name="alpha" id="alpha" value="{{old('alpha', $word->alpha)}}">
    @error('alpha')<span>{{$message}}</span>@enderror('alpha')

    <br><br>

    <label for="beta">beta</label>
    <input type="text" name="beta" id="beta" value="{{old('beta', $word->beta)}}">
    @error('beta')<span>{{$message}}</span>@enderror('beta')

    <br><br>

    <label for="part_id">part</label>
    <select name="part_id" id="part_id">
        @foreach($parts as $part)
        @if($word->part->id == $part->id)
            <option value="{{$part->id}}" selected>{{$part->name}}</option>
        @else
            <option value="{{$part->id}}">{{$part->name}}</option>
        @endif
        @endforeach
    </select>

    <br><br>

    <label for="tag_id">tag</label>
    <select name="tag_id" id="tag_id">

        @foreach($tags as $tag)
        @if($word->tag->id == $tag->id)
            <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
        @else
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endif
        @endforeach
    </select>

    <br><br>

    <input type="submit" value="Update">
</form>
@endsection('main')