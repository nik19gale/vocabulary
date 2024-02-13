@extends('layouts.base')

@section('title', 'Parts :: '.$part->name)

@section('main')
<ul>
    <li>{{$part->name}}</li>
    @isset($part->desc)<li>{{$part->desc}}</li>@endisset
</ul>

<a href="{{route('parts.edit', ['part' => $part->id])}}">Edit</a>
<br>
<form action="{{route('parts.destroy', ['part' => $part->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>
<br>
<br>
<a href="{{route('parts.index')}}">To index</a>
@endsection('main')