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
        <span class="breadcrumb-item">
            <a href="{{ route("materi.sub_materi.index", $sub_materi->materi_id) }}">
                Sub Materi
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
                            rows="2">{{ old("judul", $sub_materi->judul) }}</textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("judul") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="konten">
                        Konten:
                    </label>
                    <textarea
                            placeholder="Konten"
                            class="form-control {{ $errors->has("konten") ? "is-invalid" : "" }}"
                            name="konten"
                            id="konten"
                            cols="30"
                            rows="10"></textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("konten") }}
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

@section('footer-script')
    <script>
        window.onload = function () {
            tinyMCE.init(Object.assign(window.tinymce_settings, {
                content_css: '{{ asset('css/app.css') }}',
            }))
                .then(editors => {
                    editors[0].setContent(`{!! old('konten', $sub_materi->konten) !!}`)
                })
        }
    </script>
@endsection
