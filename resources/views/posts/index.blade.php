<!DOCTYPE html>
<html>
<head>
    <title>All Blog Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f4f4f4;
        }

        h2 {
            margin-bottom: 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
        }

        .card {
            background: white;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .card small {
            color: #777;
        }

        .card p {
            margin: 10px 0;
        }

        .actions a,
        .actions form {
            display: inline-block;
            margin-right: 8px;
        }

        .actions button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions a {
            background-color: #3498db;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        .actions button:hover,
        .actions a:hover {
            opacity: 0.9;
        }

        .alert {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <h2>All Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn">+ New Post</a>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($posts as $post)
        <div class="card">
            <h3>{{ $post->title }}</h3>
            <small>Category: {{ $post->category->name ?? 'Uncategorized' }}</small>
            <p>{{ \Illuminate\Support\Str::limit($post->body, 500) }}</p>

            <div class="actions">
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

</body>
</html>
