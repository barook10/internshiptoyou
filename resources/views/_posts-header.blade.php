<header class="container mx-auto mt-5 mb-4 text-center">
    <h1 class="text-4xl">
        <span class="text-primary">IntetnshipToYou.com</span>
    </h1>

    <h2 class="inline-flex mt-2">By Mubarak <img src="/images/fotor-20240120192911.png " width="80px" alt="Head of Lary the mascot"></h2>

    <p class="text-sm mt-4">
        The website where you can search and find your next employer for internships.
    </p>

    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between mt-4">
        <!-- Category Dropdown -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle bg-white text-dark" type="button" id="categoryDropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            </button>
            <div class="dropdown-menu"  aria-labelledby="categoryDropdown" style="margin-top: 8px;">
                <a href="/" class="dropdown-item">All</a>
                @foreach($categories as $category)
                    <a href="/categories/{{ $category->slug }}"
                       class="dropdown-item {{ isset($currentCategory) && $currentCategory->id == $category->id ? 'active' : '' }}">
                        {{ ucwords($category->name) }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Other Filters -->
        <div class="d-flex mt-2 mt-lg-0 ms-lg-4">
            <select class="form-select">
                <option value="category" disabled selected>Other Filters</option>
                <option value="foo">Foo</option>
                <option value="bar">Bar</option>
            </select>
        </div>

        <!-- Search -->
        <div class="d-flex mt-2 mt-lg-0 ms-lg-4">
            <form method="GET" action="#">
                <div class="input-group">
                    <input type="text" name="search" placeholder="Find something"
                           class="form-control bg-transparent placeholder-black font-semibold text-sm"
                           value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary bg-white text-dark">Search</button>
                </div>
            </form>
        </div>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
