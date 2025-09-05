@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-light mb-4 text-primary">Anviable Blogs You Can Read..</h1>
    <x-categorydropdown />
    <form action="/" class="my-3" method="GET" name="search">
        <div class="input-group mb-3">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}" />
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}" /> 
            @endif

            <input type="search" name="search" value="{{ request('search') }}" autocomplete="off" class="form-control"
                placeholder="Search Blogs..." />
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>
    <div class="row">
        @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <x-blog-card :blog="$blog" />
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">No blogs found.</p>
            </div>
        @endforelse
        {{ $blogs->links() }}
    </div>
</section>
