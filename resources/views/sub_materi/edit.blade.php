@extends("layouts.app")

@section("title", "Tambah Sub Materi")

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
            Ubah Sub Materi
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Ubah Sub Materi
        </h1>

        @include("messages")

        <div>
            <form action="{{ route("sub_materi.update", $sub_materi) }}"
                  method="post">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="judul">
                        Judul:
                    </label>
                    <textarea
                            class="form-control {{ $errors->has("judul") ? "is-invalid" : "" }}"
                            name="judul"
                            id="judul"
                            cols="30"
                            rows="10">{{ old("judul", $sub_materi->judul) }}</textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("judul") }}
                    </span>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-info">
                        Perbarui Sub Materi
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
