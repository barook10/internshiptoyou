@props(['post'])

<article class="card bg-success mb-4 border border-dark border-opacity-0 transition-colors duration-300 hover:bg-gray-100 hover:border-opacity-5 rounded-xl">
    <div class="card-body py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="card-img-top rounded-xl img-fluid">
            @else
                <img src="{{ asset('images/fotor-20240120192911.png') }}" alt="Default illustration" class="card-img-top rounded-xl img-fluid">

            @endif
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <br>
                <div class="space-2">
                    <x-category-button :category="$post->category"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 d-block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>

                <h2 class="text-2xl mt-2">
                    MYR {{ $post->salary }}
                </h2>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="d-flex justify-content-between align-items-center mt-8">
                <div class="d-flex align-items-center text-sm">
                    <img src="/images/fotor-20240120192911.png" alt="Lary avatar" class="rounded-circle me-3" style="width: 30px; height: 30px;">
                    <div>
                        <a href="/authors/{{$post->author->username}}" class="text-decoration-none text-dark fw-bold">
                            {{ $post->author->name }}
                        </a>
                    </div>
                </div>

                <div class="d-none d-lg-block">
                    <a href="/posts/{{ $post->slug }}" class="btn btn-outline-info btn-sm font-semibold rounded-full py-2 px-4 transition-colors duration-300 bg-gray-200 hover:bg-gray-300">
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
