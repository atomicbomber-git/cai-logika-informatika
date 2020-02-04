@extends("layouts.app")

@section("content")
    <div class="card">
        <div class="card-header">
            <i class="fas fa-pencil-alt fa-sm"></i>
            Edit Materi
        </div>

        <form action="{{ route("materi.update", $materi) }}"
              method="post">
            @method("PATCH")
            @csrf
            <div class="card-body">
                @include('messages')

                <div class="form-group">
                    <label for="judul">
                        Judul:
                    </label>
                    <textarea
                        class="form-control {{ $errors->has("judul") ? "is-invalid" : "" }}"
                        name="judul"
                        id="judul"
                        cols="30"
                        rows="10">{{ $materi->judul }}</textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("judul") }}
                    </span>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary"
                            type="submit">
                        Perbarui Data
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
