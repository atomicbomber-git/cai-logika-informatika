@extends("layouts.app")

@section("title", "Tambah Sub Materi")

@section("content")
    <div>
        <h1 class="h1 mb-3">
            Sub Materi Baru
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
                            class="form-control {{ $errors->has("judul") ? "is-invalid" : "" }}"
                            name="judul"
                            id="judul"
                            cols="30"
                            rows="10"></textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("judul") }}
                    </span>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-info">
                        Tambahkan
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
