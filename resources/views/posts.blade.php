<x-layout>

    @include('_posts-header' , ['categories' => $categories])

    <main class="container mt-6 mt-lg-20">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @if ($posts->count())

                <x-post-featured-card :post="$posts[0]" class="col mb-4" />

                @foreach($posts->skip(1) as $post)
                    <x-post-card :post="$post" class="col mb-4"/>
                @endforeach

            @else
                <p class="text-center">No posts yet. Please check later</p>
            @endif
        </div>
    </main>

</x-layout>
