@extends('layouts.base')

@section('title', 'Words :: List')

@section('main')
@if(count($words) > 0)
<table style="border-collapse: collapse;">
    <thead>
        <th>alpha</th>
        <th>beta</th>
        <th>part</th>
        <th>tag</th>
        <th>score</th>
        <th>&nbsp</th>
    </thead>
    <tbody>
        @foreach($words as $word)
        <tr>
            <td style="border: black solid 1px;">{{$word->alpha}}</td>
            <td style="border: black solid 1px;">{{$word->beta}}</td>
            <td style="border: black solid 1px;">{{$word->part->name}}</td>
            <td style="border: black solid 1px;">{{$word->tag->name}}</td>
            <td style="border: black solid 1px;">{{$word->score}}</td>
            <td style="border: black solid 1px;"><a href="{{route('words.show', ['word' => $word->id])}}">Show</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Elements not found</p>
@endif

<a href="{{route('words.create')}}">Create</a>
@endsection('main')