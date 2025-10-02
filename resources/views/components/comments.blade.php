@props(['comments','blog'])
<section class="container">
    <div class="col-md-8  mx-auto">
        @if ($blog->comments->count())
           <h5 class="my-3 text-secondary">Comments</h5>
        @else
        @endif
        @foreach ($comments as $comment)
        <x-single-comment :comment="$comment"/>
        @endforeach
        <div>
            {{ $comments->Links() }}
        </div>
    </div>
</section>
