<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
            <a href="#home" class="nav-link">Home</a>
            <a href="/#blogs" class="nav-link">Blogs</a>
            @if (!auth()->check())
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">login</a>
            @else
                <p class="nav-link">{{auth()->user()->name}}</p>
                <form action="/logout" method="post">
                 @csrf
                    <button type="submit" class="btn btn-link">
                           logout
                    </button>
                </form>
            @endif
            <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
