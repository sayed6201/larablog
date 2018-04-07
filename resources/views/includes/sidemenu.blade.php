<ul class="nav flex-column p-2 mt-sm-5 sticky-top card text-white bg-dark mb-3 ">
    @if (Auth::guest())
        <img height="200" src="images/hi.jpg" alt="">
    @else

             @if(Auth::user()->isAdmin())

                <li class="nav-item"><a class=" btn btn-success mb-sm-2" href="/admin/users">Show users</a></li>
                <li class="nav-item"><a class="btn btn-secondary mb-sm-2" href="/admin/users/create">create</a></li>
                <li class="nav-item"><a class="btn btn-primary mb-sm-2" href="{{url('/admin/posts')}}">Post show</a></li>
                <li class="nav-item"><a class="btn btn-info mb-sm-2" href="{{url('/admin/posts/create')}}">Post Create</a></li>
                <li class="nav-item"><a class="btn btn-danger mb-sm-2" href="/admin/catagories/">Catagories</a></li>
                <li class="nav-item"><a class="btn btn-info mb-sm-2" href="{{url('/admin/catagories/create')}}">Create Catagory</a></li>

             @else

                <li class="nav-item"><a class="btn btn-secondary mb-sm-2" href="{{url('users/show')}}">View profile</a></li>
                <li class="nav-item"><a class="btn btn-secondary mb-sm-2" href="{{url('users/index')}}">Dashboard</a></li>
                <li class="nav-item"><a class="btn btn-secondary mb-sm-2" href="{{url('posts/create')}}">Create Post</a></li>
                <li class="nav-item"><a class="btn btn-secondary mb-sm-2" href="{{url('posts/index')}}">View Post</a></li>

             @endif
    @endif
</ul>