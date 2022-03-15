@extends('home')
@section('content')
    <div class="container mt-5 ">
        <button class="btn btn-success my-3 btncreate">create post</button>
        @foreach ($post as $p)
            <div class="card">
                <div class="card-header">
                    {{ $p->title }}
                </div>
                <div class="card-body">
                    <p>{{ $p->content }}</p>
                    <footer class="blockquote-footer">Author: {{ $p->username }}
                        on {{ $p->created_at->diffforhumans() }}
                    </footer>

                </div>
            </div>
        @endforeach

    </div>


    <div class="modal fade bd-example-modal-lg craetepost" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content container">
                <form class="my-5" action="{{ url('post/create') }}" method="post">@csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(".btncreate").click(function() {
            $(".craetepost").modal('show')
        })
    </script>
@endpush
