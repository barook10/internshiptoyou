<x-layout>

    <section class="container px-4 py-5 mt-5">

        <main class="max-w-lg mx-auto bg-light border border-secondary p-4 rounded">

            <h1 class="text-center font-weight-bold text-xl">Log In!</h1>

            <form method="POST" action="/login" class="mt-4">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label mb-1">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>

                    @error('email')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label mb-1">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>

                    @error('password')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary bg-white text-dark">Log In!</button>
                </div>

                @if ($errors->any())
                    <ul class="text-danger">
                        @foreach($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>

        </main>

    </section>

</x-layout>
