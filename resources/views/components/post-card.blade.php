@props(['post'])

<article class="card mb-4">
    <div class="card-body">
        <div class="mb-3">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="card-img-top img-fluid rounded-xl">
            @else
                <img src="/images/fotor-20240120192911.png" alt="Default illustration" class="card-img-top img-fluid rounded-xl">
            @endif
        </div>

        <div class="d-md-flex justify-content-between align-items-start">
            <div class="mb-4 mb-md-0">
                <div class="space-2">
                    <x-category-button :category="$post->category" />
                </div>

                <h1 class="text-sm mt-3">
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                        {{ $post->title }}
                    </a>
                </h1>

                <h2 class="text-2xl mt-2">
                    MYR {{ $post->salary }}
                </h2>

                <span class="mt-2 d-block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </span>
            </div>

            <div class="flex-shrink-0 text-center text-md-start">
                <div class="mb-3 d-flex align-items-center text-sm">
                    <img src="/images/fotor-20240120192911.png" alt="Lary avatar" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                    <div>
                        <a href="/authors/{{$post->author->username}}" class="text-decoration-none text-dark fw-bold">
                            {{ $post->author->name }}
                        </a>
                    </div>
                </div>

                <a href="/posts/{{ $post->slug }}" class="btn btn-primary bg-white text-dark">
                    Read More
                </a>
            </div>
        </div>

        <div class="text-sm mt-4">
            <p>
                {{ $post->excerpt }}
            </p>
        </div>
    </div>
</article>
