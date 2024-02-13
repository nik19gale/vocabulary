@extends('layouts.base')

@section('title', 'Tags :: '.$tag->name)

@section('main')
<ul>
    <li>{{$tag->name}}</li>
    @isset($tag->desc)<li>{{$tag->desc}}</li>@endisset
    <li>Limit: {{$tag->limit}}</li>
    <li>Words in total: {{count($tag->words()->get())}}</li>
</ul>

<a href="{{route('tags.edit', ['tag' => $tag->id])}}">Edit</a>
<br>
<form action="{{route('tags.destroy', ['tag' => $tag->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>
<br>
<br>
<a href="{{route('tags.index')}}">To index</a>
@endsection('main')