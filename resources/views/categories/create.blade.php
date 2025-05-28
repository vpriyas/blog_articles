<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Category name">
    <button type="submit">Create</button>
</form>
