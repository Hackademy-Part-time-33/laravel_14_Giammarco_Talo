<x-main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>modifica tag</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tags.update', $tag) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $tag->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Conferma modifiche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
