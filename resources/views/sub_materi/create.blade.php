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
            <a href="{{ route("materi.sub_materi.index", $materi) }}">
                Sub Materi
            </a>
        </span>
        <span class="breadcrumb-item active">
            Sub Materi Baru
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Sub Materi Baru
        </h1>

        @include("messages")

        <div>
            <form action="{{ route("materi.sub_materi.store", $materi->id) }}"
                  method="post">
                @csrf

                <div class="form-group">
                    <label for="judul">
                        Judul:
                    </label>
                    <textarea
                            placeholder="Judul"
                            value="{{ old("judul") }}"
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
                    <label for="konten">
                        Konten:
                    </label>
{{--                    <textarea--}}
{{--                            placeholder="Konten"--}}
{{--                            class="form-control {{ $errors->has("konten") ? "is-invalid" : "" }}"--}}
{{--                            name="konten"--}}
{{--                            id="konten"--}}
{{--                            cols="30"--}}
{{--                            rows="10"></textarea>--}}

                    <input id="konten" value="{{ old("konten") }}" type="hidden" name="konten">
                    <trix-editor input="konten"></trix-editor>
                    <span class="invalid-feedback">
                        {{ $errors->first("konten") }}
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

@section('footer-script')
    <script>

        const toBase64 = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });

        addEventListener("trix-attachment-add", function(event) {

            if (event.attachment.file) {
                const file = event.attachment.file;
                toBase64(file)
                    .then(base64 => {

                        event.attachment.setAttributes({
                            url: base64,
                        });

                        event.attachment.setUploadProgress(100)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        })

        {{--window.onload = function () {--}}
        {{--    tinyMCE.init(Object.assign(window.tinymce_settings, {--}}
        {{--        content_css: '{{ asset('css/app.css') }}',--}}
        {{--    }))--}}
        {{--    .then(editors => {--}}
        {{--        editors[0].setContent(`{!! old('konten') !!}`)--}}
        {{--    })--}}
        {{--}--}}
    </script>
@endsection
