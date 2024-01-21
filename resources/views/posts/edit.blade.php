<x-layout>

    <section class="container px-4 py-5 mt-5">

        <main class="max-w-lg mx-auto bg-light border border-secondary p-4 rounded">

            <h1 class="text-center font-weight-bold text-xl">Edit Post! - {{ $post->title }}</h1>

            <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="title" class="form-label mb-1">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                    @error('title')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label mb-1">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $post->slug) }}" required>
                    @error('slug')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="excerpt" class="form-label mb-1">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" class="form-control" required>{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="salary" class="form-label mb-1">Salary</label>
                    <input type="number" name="salary" id="salary" class="form-control" required value="{{ old('salary', $post->salary) }}">
                    @error('salary')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="body" class="form-label mb-1">Body</label>
                    <textarea name="body" id="body" class="form-control" required>{{ old('body', $post->body) }}</textarea>
                    @error('body')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label mb-1">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @if($post->image)
                    <div class="mb-3">
                        <label for="currentImage" class="form-label mb-1">Current Image</label>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Current Post Image" class="w-full">
                    </div>
                @endif

                <div class="mb-3">
                    <label for="category_id" class="form-label mb-1">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary bg-white text-dark">Update</button>
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
