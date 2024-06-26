{{-- The first way how to add blade layout --}}
@extends('components.layout')
@section('content')
    {{-- The second way how to add blade layout is with the x-layout --}}
    {{-- <x-layout> --}}

    @foreach ($posts as $post)
        {{-- @dd($loop)  --}}
        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>
            <p>
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            <div>{{ $post->excerpt }}</div>
        </article>
    @endforeach
    {{-- </x-layout> --}}
@endsection
