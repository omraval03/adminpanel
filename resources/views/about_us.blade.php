@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($sections as $section)
        <div class="mb-5">
            <h2>{{ $section->title }}</h2>
            <p>{!! nl2br(e($section->content)) !!}</p>
            @if ($section->image)
                <img src="{{ asset('storage/' . $section->image) }}" class="img-fluid mt-2" alt="">
            @endif
        </div>
    @endforeach
</div>
@endsection
