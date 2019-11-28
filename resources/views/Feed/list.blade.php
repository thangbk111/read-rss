@extends('layout')
@section('content')
    @foreach($items as $item)
        <div class="header">
            <h1>Feed: {{ $item['feed_title'] }}</h1>
        </div>
        <h2>Title: <a href="{{ $item['url'] ?? '#' }}" target="_blank">{{ $item['title'] ?? '' }}</a></h2>
        {!! $item['description'] ?? '' !!}
        <p><small>Posted on {{ $item['created_at'] }}</small></p>
        <div class="line"></div>
    @endforeach
@endsection