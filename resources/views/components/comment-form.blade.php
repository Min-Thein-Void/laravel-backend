<x-card-wrapper class="bg-white">
    <form method="POST" action="/blogs/{{ $blog->slug }}/comment" class="mb-3">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="body" name="body" rows="5" placeholder="Say something...">
            </textarea>
        </div>
        <x-error field="body"/>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </div>
    </form>
</x-card-wrapper>
