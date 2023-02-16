<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // récupère tous le posts
        $posts = Post::all();
        $video = Video::find(1);

        return view ('articles', [
            'posts' => $posts,
            'video' => $video
        ]);
        // return view('articles', compact('posts'));
        // return view('articles', ['title' => $title, 'title2' => $title2]);
        // return view('articles')->with('title', $title);
    }

    public function show($id)
    {

        $post = Post::findOrFail($id);


        // $post = Post::where('title', '=', 'Alias blanditiis tempore nemo soluta.')->first();
        // $post = $posts[$id] ?? 'Pas de titre';

        return view('article', [
            'post' => $post
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        // Storage::disk('local')->put('avatar', $request->file('avatar'));

        $filename = time(). '.' . $request->avatar->extension();


        $path = $request->file('avatar')->storeAs('avatars', $filename, 'public');

        // $request->validate([
        //     // 'title' => 'required|max:255|min:5|unique:posts',
        //     'title' => [
        //         'required',
        //         'max:255',
        //         'min:5',
        //         'unique:posts'
        //     ],
        //     'content' => 'required'
        // ]);

        // PREMIERE FACON DE FAIRE

        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        // DEUXIEME FACON DE FAIRE (BONNE PRATIQUE)


        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $image = new Image();
        $image->path = $path;

        $post->image()->save($image);

    }

    public function register() {

        $post = Post::find(10);
        $video = Video::find(1);

        // dd($video);

        $comment1 = new Comment(['comment' => 'Mon premier commentaire']);
        $comment2 = new Comment(['comment' => 'Mon deuxieme commentaire']);
        $comment3 = new Comment(['comment' => 'Mon troisieme commentaire']);

        $video->comments()->save($comment3);
        $post->comments()->saveMany([$comment1, $comment2]);
    }
}
