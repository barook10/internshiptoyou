<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntetnshipToYou</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon1.ico') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" defer></script>
</head>
<body style="font-family: Open Sans, sans-serif">

<section class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar"style="text-decoration: none;" href="/" >
        <p class="text-center font-bold text-4xl">
            <span style="color: #3498db;">intern</span><span style="color: #e74c3c;">Ship</span><span style="color: #2ecc71;">To</span><span style="color: #f39c12;">You</span>
        </p>
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <span class="nav-link">Welcome {{ auth()->user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a href="/create" class="nav-link">New Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="/manage/{{ auth()->user()->username }}" class="nav-link">Manage</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="/logout" class="nav-link">
                            @csrf
                            <button type="submit" class="btn nav-link btn-primary bg-white" >Log Out</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link btn btn-primary bg-white text-dark">Subscribe for Updates</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-light border border-dark border-opacity-5 rounded-xl text-center py-5 mt-5">
        <img src="/images/fotor-20240120192911.png" alt="" class="mx-auto mb-3" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest job postings</h5>


        <div class="mt-3">
            <form class="d-flex justify-content-center">
                <input type="text" class="form-control" placeholder="Your email address">
                <button type="submit" class="btn btn-primary bg-white text-dark ml-2">Subscribe</button>
            </form>
        </div>
    </footer>
</section>

<x-flash/>

</body>
</html>
