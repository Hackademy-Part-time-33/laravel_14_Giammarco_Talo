<x-main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Crea un nuovo Tag</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tags.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome del tag</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Salva</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
