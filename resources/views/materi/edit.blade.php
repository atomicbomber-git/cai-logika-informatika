@extends("layouts.app")

@section("title", "Ubah Materi")

@section("content")
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="">
            {{ config("app.name") }}
        </a>
        <span class="breadcrumb-item">
            <a href="{{ route("materi.index") }}">
                Materi
            </a>
        </span>
        <span class="breadcrumb-item active">
            Edit
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Materi Baru
        </h1>

        @include("messages")

        <form action="{{ route("materi.update", $materi) }}" method="POST">
            @csrf
            @method("PATCH")

            <div class="form-group">
                <label for="judul">
                    Judul:
                </label>
                <textarea
                        placeholder="Judul"
                        class="form-control {{ $errors->has("judul") ? "is-invalid" : "" }}"
                        name="judul"
                        id="judul"
                        cols="30"
                        rows="10">{{ old("judul", $materi->judul) }}</textarea>
                <span class="invalid-feedback">
                    {{ $errors->first("judul", $materi->judul) }}
                </span>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-info btn-sm" type="submit">
                    Perbarui Materi
                    <i class="fas fa-check"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
