<x-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
            <h3 class="text-center mb-4 text-primary">Register Form</h3>
            <form action="/post_login" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" value={{ old('email') }}>
                </div>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-primary w-100">login</button>
            </form>

            <p class="text-center mt-3 mb-0">
                Already have an account? <a href="#" class="text-decoration-none">Login</a>
            </p>
        </div>
    </div>
</x-layout>
