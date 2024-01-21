<x-layout>

    <section class="container mt-5">

        <main class="container bg-light border border-secondary p-4 rounded-xl">

            <h1 class="text-center font-weight-bold text-xl mb-4">Manage Post</h1>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th>Title</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="/posts/{{ $post->slug }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary bg-white text-dark">Edit</a>
                                    <form method="POST" action="/posts/{{ $post->id }}" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </main>

    </section>

</x-layout>
