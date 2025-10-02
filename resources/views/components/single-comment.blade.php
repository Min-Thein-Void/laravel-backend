<x-card-wrapper>
    <div class="d-flex">
        <div>
            <img src="{{ $comment->author->avatar ?? 'https://imgs.search.brave.com/bFLognz8LKvfSIVGMCA9iDAe-sPzUV9Q75VbR-Jxa68/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzYyLzAx/LzBkLzYyMDEwZDg0/OGI3OTBhMjMzNmQx/NTQyZmNkYTUxNzg5/LmpwZw' }}" width="50" height="50"
                class="rounded-circle" alt="User Avatar" />

        </div>
        <div class="ms-3">
            <h6>{{ $comment->author->name }}</h6>
            <p class="text-secondary">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
    </div>
    <p class="mt-1">
        {{ $comment->body }}
    </p>
</x-card-wrapper>
