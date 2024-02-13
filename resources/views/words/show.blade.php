@extends('layouts.base')

@section('title', 'Words :: '.$word->name)

@section('main')
<ul>
    <li>{{$word->alpha}} --- {{$word->beta}}</li>
    <li>{{$word->part->name}}</li>
    <li>{{$word->tag->name}}</li>
    <li>Score: {{$word->score}}</li>
</ul>

<a href="{{route('words.edit', ['word' => $word->id])}}">Edit</a>
<br>
<form action="{{route('words.destroy', ['word' => $word->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>
<br>
<br>
<a href="{{route('words.index')}}">To index</a>
@endsection('main')