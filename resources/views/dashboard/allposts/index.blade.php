@extends('dashboard.layout.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Post</h1>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="table-responsive">

    <form action="/dashboard/allposts" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search By author..." name="author" value="{{request('author')}}">
        <button class="btn btn-primary" type="submit">Search</button>
     </div>
    </form>

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$post->author->name}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->category->name}}</td>
                <td>
                <a href="/posts/{{$post->slug}}" class="badge bg-primary"><span data-feather="eye"></span></a>
                    <form action="/dashboard/allposts/{{$post->slug}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure want delete category ?')"><span data-feather="trash-2"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$posts->links()}}
@endsection
