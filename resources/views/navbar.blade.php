<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container">

        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse mr-auto"" id=" navbarSupportedContent">

            <ul class="navbar-nav ml-auto ">
                <li class=" nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/post') }}">Add Post</a>
                </li>

                <li class="  nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->role == 'admin')
                            <a class="dropdown-item" href="{{ url('/author') }}">Add Author</a>
                        @endif
                        <form action="{{ url('/logout') }}" method="post">@csrf
                            <button type="submit" class="dropdown-item" href="{{ url('/logout') }}">Logout</button>
                        </form>

                        <div />
                </li>
            </ul>
            {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}
        </div>
    </div>
</nav>
