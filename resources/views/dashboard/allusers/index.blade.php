@extends('dashboard.layout.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All users</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

<div class="table-responsive">
    <a href="/dashboard/allusers/create" class="btn btn-primary mb-3"><span data-feather="plus-circle"></span> Create new user</a>

    <form action="/dashboard/allusers">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{request('search')}}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Admin</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->is_admin}}</td>
                <td>
                    <a href="/dashboard/allusers/{{$user->username}}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/allusers/{{$user->username}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure want delete user ?')"><span data-feather="trash-2"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$users->links()}}
@endsection