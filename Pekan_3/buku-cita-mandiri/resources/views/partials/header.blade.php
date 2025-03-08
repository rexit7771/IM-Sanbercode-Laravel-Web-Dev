<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="https://i.pinimg.com/550x/d5/0a/5f/d50a5fbb0302caf4c2e7ba1ae3d7b993.jpg" alt="">
            <h1 class="sitename">Buku Cita Mandiri</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/genre"><span>Genre</span></a></li>
                <li><a href="/books"><span>Book</span></a></li>
                @guest
                    <li><a href="/login"><span class="btn btn-primary">Login</span></a></li>
                @endguest
                @auth
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <input type="submit" value="Logout" class="btn btn-danger">
                        </form>
                    </li>
                @endauth
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
