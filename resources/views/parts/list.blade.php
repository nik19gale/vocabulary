@extends('layouts.base')

@section('title', 'Parts :: List')

@section('main')
@if(count($parts) > 0)
<ul>
    @foreach($parts as $part)
    <li>
        {{$part->name}} - [{{count($part->words()->get())}}] words in total - <a href="{{route('parts.show', ['part' => $part->id])}}">Show</a>
    </li>
    @endforeach
</ul>
@else
<p>Elements not found</p>
@endif

<a href="{{route('parts.create')}}">Create</a>
@endsection('main')