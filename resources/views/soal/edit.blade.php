@extends("layouts.app")

@section("title", "Ubah Soal")

@section("content")
    <nav class="breadcrumb">
        <a class="breadcrumb-item"
           href="">
            {{ config("app.name") }}
        </a>
        <span class="breadcrumb-item">
            <a href="{{ route("materi.soal.index", $soal->materi_id) }}">
                Soal
            </a>
        </span>
        <span class="breadcrumb-item active">
            Ubah Soal
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Ubah Soal
        </h1>

        @include("messages")

        <div>
            <form action="{{ route("soal.update", $soal) }}"
                  method="post">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="konten">
                        Konten:
                    </label>

                    <input id="konten"
                           value="{{ old("konten", $soal->konten) }}"
                           type="hidden"
                           name="konten">
                    <trix-editor class="{{ $errors->has("konten") ? "is-invalid" : "" }}"
                                 input="konten"></trix-editor>
                    <span class="invalid-feedback">
                        {{ $errors->first("konten") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="urutan"> Urutan: </label>
                    <input
                        id="urutan"
                        type="text"
                        placeholder="Urutan"
                        class="form-control {{ $errors->has("urutan") ? "is-invalid" : "" }}"
                        name="urutan"
                        value="{{ old("urutan", $soal->urutan) }}"
                    />
                    @foreach($errors->get("urutan") ?? [] as $feedback)
                        <span class="invalid-feedback">
                        {{ $feedback }}
                    </span>
                    @endforeach
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit"
                            class="btn btn-outline-info">
                        Perbarui
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
