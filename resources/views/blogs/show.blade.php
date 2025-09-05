@props(['random'])
<x-layout>
    <!-- Single Blog Section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
               <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg" class="card-img-top" alt="..." />

                <h1 class="fw-bold mb-3">{{ $blog->title }}</h1>
                <p><a href="/?category={{ $blog->category->slug }}">{{$blog->category->name}}</a></p>
                <p><a href="/users/{{ $blog->author->username }}">{{$blog->author->name}}</a>
                </p>
                <p class="text-muted small mb-4">
                 {{ $blog->created_at->format('F d, Y') }}
                </p>

                <div class="fs-5 lh-lg text-start">
                    {!! nl2br(e($blog->body)) !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Related Blogs -->
    <div class="container py-5">
        <h3 class="fw-semibold mb-4">You might also like</h3>
        <div class="row g-4">
            @foreach ($random as $item)
                <div class="col-md-4">
                    <x-blog-card :blog="$item" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
