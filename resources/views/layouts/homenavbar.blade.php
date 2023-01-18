<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-dark">
    <div class="container-fluid">
        <img src="{{asset('/images/logo.png')}}" class="rounded-circle" style="max-height: 36px;">
        <a class="navbar-brand" href="{{route('home')}}">URC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('view.index')}}">Device</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}" >Login</a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}" >Register</a>
                    </li>
                @endguest
                @if (!Auth::guest())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->firstname}} {{Auth::user()->lastname}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            @if(Auth::user()->accesslevel==1)
                                <li><a class="dropdown-item" href="{{route('manage.index')}}" >Management</a></li>
                            @endif
                                @if(Auth::user()->accesslevel==2)
                                    <li><a class="dropdown-item" href="{{route('rental.index')}}" >Management</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{route('returnrental')}}" >Return a Rental</a></li>

                            <li><a class="dropdown-item" href="{{route('customer.show',['customer'=>Auth::user()->id])}}" >Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </li>
                @endif
            </ul>
            <form class="d-flex" action="{{route('search')}}">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!-- End Nav Bar -->
