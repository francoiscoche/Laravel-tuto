@extends('layouts.app')

@section('content')
    <div class="my-4 border border-black p-2">
        <h1 class="text-2xl mb-4">Ma liste d'articles</h1>
        <ul>
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <li><a href="{{ route('posts.show', ['id' => $post->id ]) }}">{{ $post->title}}</a></li>
                @endforeach
            @else
                <span>Aucun post en base de données</span>
            @endif
        </ul>
    </div>

    <div class="my-4 border border-black p-2">
        <h1 class="text-2xl mb-4">Ma liste de vidéos</h1>
        <a href="">{{ $video->title}}</a></li>

        <div class="my-4">
                <h1 class="mb-4">Commentaires de la video</h1>

            <ul>
                @forelse($video->comments as $comment)
                    <li>{{ $comment->comment }} | crée le {{ $comment->created_at->format('d/m/Y') }}</li>
                @empty
                    <p>Aucun commentaire</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection