@extends('home')
@section('content')
    <form class="my-5" action="{{ url('post/update') }}" method="post">@csrf
        <div class="form-group">
            <input type="hidden" value="{{ $post->id }}">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" value="{{ $post->title }}">

        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1"
                rows="3">{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
