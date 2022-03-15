@extends('home')
@section('content')
    <h6>Update Form</h6>
    <form action="{{ url('author/update') }}" method="post">@csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name </label>
            <input value="{{ $user->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username </label>
            <input value="{{ $user->username }}" name="username" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input value="{{ $user->name }}" name="password" type="password" class="form-control"
                id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
