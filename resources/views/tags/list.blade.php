@extends('layouts.base')

@section('title', 'Tags :: List')

@section('main')
@if(count($tags) > 0)
<ul>
    @foreach($tags as $tag)
    <li>
        {{$tag->name}} - [{{count($tag->words()->get())}}] words in total - Limit: {{$tag->limit}} - <a href="{{route('tags.show', ['tag' => $tag->id])}}">Show</a>
    </li>
    @endforeach
</ul>
@else
<p>Elements not found</p>
@endif

<a href="{{route('tags.create')}}">Create</a>
@endsection('main')