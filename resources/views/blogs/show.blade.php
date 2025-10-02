@props(['comments', 'random', 'blog'])

<x-layout>
    <!-- Blog Article Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Blog Header -->
                    <article class="card border-0 shadow-sm">
                        <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                            class="card-img-top rounded-top" alt="{{ $blog->title }}">
                        <div class="card-body px-4 py-5">
                            <!-- Category + Title -->
                            <div class="mb-3">
                                <a href="/?category={{ $blog->category->slug }}"
                                    class="badge bg-primary text-uppercase">{{ $blog->category->name }}</a>
                            </div>

                            <h1 class="fw-bold display-5 mb-3">{{ $blog->title }}</h1>

                            <!-- Author + Date -->
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://ui-avatars.com/api/?name={{ $blog->author->name }}&background=random"
                                    alt="{{ $blog->author->name }}" class="rounded-circle me-3" width="50"
                                    height="50">
                                <div>
                                    <a href="/users/{{ $blog->author->username }}"
                                        class="fw-semibold text-decoration-none">
                                        {{ $blog->author->name }}
                                    </a>
                                    <p class="text-muted small mb-0">
                                        Published on {{ $blog->created_at->format('F d, Y') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Subscribe Button -->
                            @auth
                                <form method="POST" action="/blogs/{{ $blog->slug }}/subscribe">
                                    @csrf
                                    @if (auth()->user()->isSubscribed($blog))
                                        <button type="submit" class="btn btn-outline-danger mb-4">Unsubscribe</button>
                                    @else
                                        <button type="submit" class="btn btn-outline-warning mb-4">Subscribe</button>
                                    @endif
                                </form>
                            @endauth

                            <!-- Blog Content -->
                            <div class="fs-5 lh-lg text-dark">
                                {!! nl2br(e($blog->body)) !!}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Comments Section -->
    <section class="bg-light py-5">
        <div class="container">
            <x-comments :comments="$comments" :blog="$blog" />
            @auth
                <x-comment-form :blog="$blog" />
            @endauth
        </div>
    </section>

    <!-- Related Blogs Section -->
    <section class="py-5">
        <div class="container">
            <h3 class="fw-semibold mb-4">You might also like</h3>
            <div class="row g-4">
                @foreach ($random as $item)
                    <div class="col-md-4">
                        <x-blog-card :blog="$item" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
