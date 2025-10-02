<div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="max-width: 350px;">
    <img src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : 'https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg' }}"
        alt="Blog Thumbnail" class="card-img-top" alt="{{ $blog->title }}" style="object-fit: cover; height: 200px;" />
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-2">{{ $blog->title }}</h5>

        <p class="text-muted small mb-2 pointer">
            <a href="/?author={{ $blog->author->username }}">{{ $blog->author->name }}</a><span>
                {{ $blog->created_at->diffForHumans() }}</span>
        </p>

        <span class="badge bg-light text-dark border mb-2">
            <a href="/?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a>
        </span>

        <p class="text-secondary small mt-2">{{ $blog->intro }}</p>

        <a href="/blogs/{{ $blog->slug }}" class="btn btn-sm btn-primary rounded-pill mt-2">
            Read More →
        </a>

        {{-- Conditional Delete Button --}}
        @if (auth()->check() && auth()->user()->is_admin && auth()->user()->name === $blog->author->name)
            <form action="/blog/{{ $blog->id }}/destroy" method="POST" class="d-inline-block mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger rounded-pill"
                    onclick="return confirm('Are you sure you want to delete this blog?')">
                    Delete
                </button>
            </form>
        @endif
    </div>
</div>
