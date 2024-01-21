@props(['category'])

<a href="/categories/{{ $category->slug }}" class="btn btn-outline-secondary  rounded-full text-uppercase font-weight-bold text-info" style="font-size: 10px">
    {{ $category->name }}
</a>
