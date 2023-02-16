@extends('layouts.app')

@section('content')
    {{-- Article titre et content --}}
    <div class="my-4 border border-black p-2">
        <h1 class="mb-4 text-2xl">
            <img src="{{ $post->image ? Storage::url($post->image->path) : "" }}" alt="">
            {{ $post->title }}
        </h1>
        <p>{{ $post->content }}</p>
    </div>

    {{-- Article commentaires --}}
    <div class="my-4 border border-black p-2">
        <h1 class="mb-4">Commentaires du post</h1>

        <ul>
            @forelse($post->comments as $comment)
                <li>{{ $comment->comment }} | crée le {{ $comment->created_at->format('d/m/Y') }}</li>
            @empty
                <p>Aucun commentaire</p>
            @endforelse
        </ul>
    </div>


    {{-- Article tags --}}
    <div class="my-4 border border-black p-2">
        <ul>
            @forelse ($post->tags as $tag)
                <li>{{ $tag->name }}</li>
            @empty
                <p>Pas de tag</p>
            @endforelse
        </ul>
    </div>
@endsection