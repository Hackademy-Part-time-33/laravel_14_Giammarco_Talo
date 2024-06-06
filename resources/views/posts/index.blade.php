<x-main>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Elenco dei Post</h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Crea Nuovo Post</a>
        </div>
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-subtitle text-muted">Scritto da: {{ $post->user->name }} | {{ $post->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->body }}</p>
                    <div class="d-flex justify-content-between">
                        <div>
                            @foreach($post->tags as $tag)
                                <span class="badge bg-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <div>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Vedi</a>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Modifica</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</x-main>
