@extends('layouts.app')

@section('content')
    <h1>Créer un post</h1>

    {{-- <form method="POST" action="">
        <input type="text" name="title">
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <button type="submi"></button>

    </form> --}}

    @if ($errors->any())
      @foreach ($errors->all() as $error)
          <div class="text-red-500">
            {{ $error }}
          </div>
      @endforeach
    @endif

    <form method="post" action="{{ route('posts.store') }}" class="w-full max-w-sm" enctype="multipart/form-data">
        @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Title
            </label>
          </div>
          <div class="md:w-2/3">
            <input name="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text">
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
              Content
            </label>
          </div>
          <div class="md:w-2/3">
            <textarea name="content" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
            </textarea>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="avatar">Choose a profile picture:</label>
          <input type="file"
                name="avatar"
                accept="image/png, image/jpeg">
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Sign Up
            </button>
          </div>
        </div>
      </form>



@endsection