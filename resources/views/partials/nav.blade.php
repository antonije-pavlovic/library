<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(session()->has('links') && session()->has('categories'))
                @foreach(session()->get('links')[0] as $link)
                    @if($link->name == "Category")
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$link->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(session()->get('categories')[0] as $cat)
                                    <a class="dropdown-item categoryFilter"  data-id = "{{$cat->id}}">{{$cat->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{$link->path}}">{{$link->name}}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            @if(!session()->has('user'))
                <a href="/login" class="btn btn-outline-success my-2 my-sm-0 ">Login</a>
                <span>or</span>
                <a href="/register" class="btn btn-outline-success my-2 my-sm-0" >Register</a>
            @else
                <a href="/logout" class="btn btn-outline-success my-2 my-sm-0 ">Logout</a>
                <a href="/admin" class="btn btn-outline-success my-2 my-sm-0 ">Admin</a>

                <a href="/cart" class="btn btn-outline-success ml-4 my-2 my-sm-0">
                    Cart
                </a>
            @endif
        </form>
    </div>
</nav>