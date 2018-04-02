<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->

        <link href="{{asset('boot/bootstrap.min.css')}}" rel="stylesheet">

        <title>Hello, world!</title>
    </head>
    <body>

    <nav class="navbar nav-tabs navbar-expand-lg navbar-light" style="background-color: #93b7f2;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">LaravelBlog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/logout')}}">Log Out</a>
                        </div>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/admin/users">Show users</a>
                        <a class="dropdown-item" href="/admin/users/create">create</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
        </div>
    </nav>



    <div class="container">
        <div class="row">
                <div class="col-md-2">
                    <ul class="nav flex-column p-2 mt-sm-5 sticky-top card text-white bg-dark mb-3 ">
                        @if (Auth::guest())
                            <img height="200" src="images/hi.jpg" alt="">
                            @else

                        <li class="nav-item"><a class="btn btn-primary mb-sm-2" href="{{url('/admin/posts')}}">Post show</a></li>
                        <li class="nav-item"><a class="btn btn-info mb-sm-2" href="{{url('/admin/posts/create')}}">Post Create</a></li>
                        <li class="nav-item"><a class="btn btn-danger mb-sm-2" href="/admin/catagories/">Catagories</a></li>
                        <li class="nav-item"><a class="btn btn-info mb-sm-2" href="{{url('/admin/catagories/create')}}">Create Catagory</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>

                        @endif
                    </ul>
                </div>
                <div class="col-md-10">
                    @yield('content')
                </div>
         </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('boot/jquery-3.2.1.slim.min.js')}}"></script>
    <script src="{{asset('boot/popper.min.js')}}"></script>
    <script src="{{asset('boot/bootstrap.min.js')}}"></script>

    </body>

</html>