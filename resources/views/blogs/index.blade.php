<x-layout>
    @if (session('name'))
        <div class="text-center bg-danger text-white py-2">
            <p>
                {{ session('name') }}
            </p>
        </div>
    @endif
    @if (session('success'))
        <div class="text-center bg-warning text-white py-2">
            <p>
                {{ session('success') }}
            </p>
        </div>
    @endif
    <x-hero />
    <x-blogs-section :blogs="$blogs" />
</x-layout>

