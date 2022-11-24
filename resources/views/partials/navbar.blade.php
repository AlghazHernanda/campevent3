<nav class="navbar navbar-expand-lg navbar-light bg-brown">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img class="logo w-50" src="/source/img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="menu fw-bolder mx-4" href="/">Home</a>
                <a class="menu fw-bolder mx-4" href="/listevent">Event</a>
                <a class="menu fw-bolder mx-4" href="/about">About Us</a>
                <a class="menu fw-bolder mx-4" href="/faq">FAQ</a>
            </div>

            <ul>
                {{-- kalo udah login, tampilin ini --}}
                @auth
                <li class="nav-item dropdown" style="list-style: none">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" id="navbarDropdownMenuLink" style="color: white">
                        <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->image) }}" width="40" height="40px">
                        {{-- {{ asset('storage/' . $event->image) }} --}}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-lg-end navbar-drop" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item disabled"> {{ auth()->user()->fullname }}</a></li>
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="/myevent">Event</a></li>
                        <li><a class="dropdown-item" href="/wishlist">Wishlist</a>
                        </li>
                        <li class="text-center ">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn-hover btn-logout mb-3 border-0 mt-3"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>

                {{-- kalo belum login, tampilkan logo login --}}
                @else
                <div class="mx-3 mt-3">
                    <a href="/login"><button class="btn btn-brown px-5 fw-bolder text-white" type="submit">Login</button>
                    </a>
                </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>