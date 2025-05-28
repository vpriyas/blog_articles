<a href="{{ route('categories.create') }}">Add Category</a>

@foreach ($categories as $category)
    <p>
        {{ $category->name }}
        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </p>
@endforeach
