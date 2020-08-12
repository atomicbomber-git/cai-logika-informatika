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
                        data-cy="judul_field"
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

                <div class="form-group">
                    <label for="deskripsi">
                        Deskripsi:
                    </label>
                    <textarea
                        data-cy="deskripsi_field"
                        placeholder="Deskripsi"
                        class="form-control {{ $errors->has("deskripsi") ? "is-invalid" : "" }}"
                        name="deskripsi"
                        id="deskripsi"
                        cols="30"
                        rows="10">{{ old("deskripsi") }}</textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("deskripsi") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="urutan"> Urutan: </label>
                    <input
                            id="urutan"
                            type="text"
                            placeholder="Urutan"
                            class="form-control @error("urutan") is-invalid @enderror"
                            name="urutan"
                            value="{{ old("urutan") }}"
                    />
                    @error("urutan")
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button
                        data-cy="submit_button"
                        type="submit"
                            class="btn btn-outline-info">
                        Tambahkan
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
