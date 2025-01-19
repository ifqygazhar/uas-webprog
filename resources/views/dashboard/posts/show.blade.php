@extends('dashboard.layout.main')


@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1>{{$post->title}}</h1>

            <a href="/dashboard/allposts" class="btn btn-success "><span data-feather="arrow-left"></span> Back to my all posts</a>
            <a href="/dashboard/allposts/{{$post->slug}}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>

            <form action="/dashboard/allposts/{{$post->slug}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure want delete post ?')"><span data-feather="trash-2"></span>Delete</button>
            </form>
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image )}}" alt="{{ $post->category->name }}" class="img-fluid">
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            <a href="/dashboard/allposts" class="text-decoration-none">Back to post</a>
        </div>
    </div>
</div>
@endsection