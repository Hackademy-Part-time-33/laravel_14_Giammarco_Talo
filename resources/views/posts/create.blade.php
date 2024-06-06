<x-main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Crea un nuovo post</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="title" class="form-label">Titolo</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Contenuto</label>
                                <textarea class="form-control" id="body" name="body" rows="5">{{ old('body') }}</textarea>
                                @error('body')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-control">
                                    @foreach ($tags as $tag)
                                    <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                                    <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                    @endforeach
                                    @if ($tags->isEmpty())
                                    <p><a href="{{ route('tags.create') }}">Crea un nuovo tag</a></p>
                                    @endif
                                </div>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary">Pubblica post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
