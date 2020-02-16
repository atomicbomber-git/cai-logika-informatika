@extends("layouts.app")

@section("title", "Tambah Materi")

@section("content")
    <nav class="breadcrumb">
        <a class="breadcrumb-item"
           href="">
            {{ config("app.name") }}
        </a>
        <span class="breadcrumb-item">
            <a href="{{ route("materi.index") }}">
                Materi
            </a>
        </span>
        <span class="breadcrumb-item active">
            Materi Baru
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Materi Baru
        </h1>

        @include("messages")

        <div>
            <form action="{{ route("materi.store") }}"
                  method="post">
                @csrf

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
                        rows="2"></textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("judul") }}
                    </span>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit"
                            class="btn btn-outline-info">
                        Tambahkan
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
