@extends('home')
@section('content')
    @foreach ($post as $p)
        <div class="card mb-3">
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
@endsection
