<x-layout>

    <main class="container mt-10 mt-lg-20">
        <article class="row">
            <div class="col-lg-4 text-center lg:pt-14 mb-10">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="rounded-xl img-fluid">
                @else
                    <img src="/images/fotor-20240120192911.png" alt="Default illustration" class="rounded-xl img-fluid">
                @endif

                <p class="mt-4 text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="d-flex align-items-center justify-content-lg-center text-sm mt-4">
                    <img src="/images/fotor-20240120192911.png" alt="Lary avatar" class="rounded-circle me-3" style="width: 90px; ">
                    <div class="text-left">
                        <a href="/authors/{{$post->author->username}}" class="text-decoration-none text-dark fw-bold">
                            {{ $post->author->name }}
                        </a>


                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="d-none d-lg-flex justify-content-between mb-6">
                    <a href="/" class="text-lg text-decoration-none hover-text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="me-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                                <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                        Back to Posts
                    </a>

                    <div class="space-2">
                        <x-category-button :category="$post->category"/>
                    </div>
                </div>

                <h1 class="font-weight-bold text-3xl mb-10">
                    {{ $post->title }}
                </h1>

                <h1 class="font-weight-bold text-3xl mb-10">
                    MYR {{ $post->salary }}
                </h1>

                <div class="space-y-4 text-lg leading-loose">
                    <p>
                        {{ $post->body }}
                    </p>
                </div>
            </div>
        </article>
    </main>

</x-layout>
