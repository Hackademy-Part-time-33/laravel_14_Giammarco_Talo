<x-main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Modifica post</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Titolo</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">contenuto</label>
                                <textarea class="form-control" id="body" name="body" rows="5">{{ old('body', $post->body) }}</textarea>
                                @error('body')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <div>
                                    @foreach ($tags as $tag)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                    @endforeach
                                    @if ($tags->isEmpty())
                                    <p>Inserire dei tags<a href="{{ route('tags.index') }}">Crea dei tags</a></p>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Conferma modifiche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
