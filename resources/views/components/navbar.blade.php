<nav class="navbar navbar-dark bg-dark">
    <div class="container p-2">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex mt-2">
            <a href="#home" class="nav-link">Home</a>
            <a href="/#blogs" class="nav-link">Blogs</a>
            @if (!auth()->check())
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">login</a>
            @else
                <div class="d-flex">
                    <img src="{{ auth()->user()->avatar ?? 'https://imgs.search.brave.com/bFLognz8LKvfSIVGMCA9iDAe-sPzUV9Q75VbR-Jxa68/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzYyLzAx/LzBkLzYyMDEwZDg0/OGI3OTBhMjMzNmQx/NTQyZmNkYTUxNzg5/LmpwZw' }}"
                        alt="user profile" width="40" height="40" style="border-radius: 50%;">
                    <p class="nav-link">{{ auth()->user()->name }}</p>
                </div>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        logout
                    </button>
                </form>
            @endif
            @if (auth()->check() && auth()->user()->is_admin)
                <a href="/blog/admin/create" class="nav-link">Create</a>
            @endif

        </div>
    </div>
</nav>
