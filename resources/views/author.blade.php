@extends('home')
@section('content')
    <h5 class="my-t">
        Author List
    </h5>
    <div class="row justify-content-end my-3">

        <button class="btn btn-success createAuthor">Create Author</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ url('author/destroy') }}" method="post">@csrf
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <button type="submit" class="btn btn-danger"><small>delete</small></button>
                        </form>
                        <form action="{{ url('author/update/' . $user->id) }}" method="get">
                            <button type="submit" class="btn btn-warning"><small>update</small></button>
                        </form>
                    </td>


                </tr>
            @endforeach
            <div class="row justify-content-center"></div>

        </tbody>
    </table>


    <div class="modal fade bd-example-modal-lg modalCreate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content container ">

                <div class="my-5">
                    <h6>Create Author</h6>
                    <form class="formCreate" action="{{ url('author/create') }}" method="post">@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">.</small>
                        </div>
                        <div class="form-group">

                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary createButton">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg modalCreate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content container ">

                <div class="my-5">
                    <h6>Create Author</h6>
                    <form class="formCreate" action="{{ url('author/create') }}" method="post">@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">.</small>
                        </div>
                        <div class="form-group">

                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary createButton">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('.createAuthor').click(function() {
            $('.modalCreate').modal('show')
            $(".createButton").click(function() {
                let form = new Form($('.formCreate'));
                $.ajax({
                    type: "POST",
                    url: "{{ url('author/create') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                })

            })
        })
    </script>
@endpush
