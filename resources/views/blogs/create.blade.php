@props(['categories'])

<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4 text-center fw-bold">Create New Blog Post</h1>

                <x-card-wrapper>
                    <form action="/blog/admin/store" method="POST" class="p-4" enctype="multipart/form-data">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title') }}" required>
                            <x-error field="title" />
                        </div>

                        {{-- Intro --}}
                        <div class="mb-3">
                            <label for="intro" class="form-label">Intro</label>
                            <textarea name="intro" id="intro" rows="3" class="form-control">{{ old('intro') }}</textarea>
                            <x-error field="intro" />
                        </div>

                        {{-- Slug --}}
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                value="{{ old('slug') }}" required>
                            <x-error field="slug" />
                        </div>

                        {{-- Body --}}
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea name="body" id="body" rows="6" class="form-control">{{ old('body') }}</textarea>
                            <x-error field="body" />
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Photo</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                        </div>

                        {{-- Category --}}
                        <div class="mb-4">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error field="category_id" />
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Create Blog Post
                            </button>
                        </div>
                    </form>
                </x-card-wrapper>
            </div>
        </div>
    </div>
</x-layout>
