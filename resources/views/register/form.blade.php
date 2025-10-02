<x-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
            <h3 class="text-center mb-4 text-primary">Register Form</h3>
            <form action="/register" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value={{ old('name') }}>
                </div>
                <x-error field="name"/>

                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" name="username" class="form-control" id="username" value={{ old('username') }}>
                </div>

                <x-error field="username"/>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" value={{ old('email') }}>
                </div>

                <x-error field="email"/>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <x-error field="password"/>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <p class="text-center mt-3 mb-0">
                Already have an account? <a href="#" class="text-decoration-none">Login</a>
            </p>
        </div>
    </div>
</x-layout>
