@extends("layouts.app")

@section("title", "Ubah Pilihan Jawaban")

@section("content")
    <nav class="breadcrumb">
        <a class="breadcrumb-item"
           href="">
            {{ config("app.name") }}
        </a>
        <span class="breadcrumb-item">
            <a href="{{ route("soal.pilihan_jawaban.index", $pilihan_jawaban->soal) }}">
                Pilihan Jawaban
            </a>
        </span>
        <span class="breadcrumb-item active">
            Ubah Pilihan Jawaban
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Ubah Pilihan Jawaban
        </h1>

        <blockquote class="blockquote">
            <p>
                <span class="font-weight-bold"> Soal: </span> {{ $pilihan_jawaban->soal->konten }}
            </p>
        </blockquote>

        @include("messages")

        <div>
            <form action="{{ route("pilihan_jawaban.update", $pilihan_jawaban) }}"
                  method="post">
                @csrf
                @method("PUT")

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
                        rows="2">{{ old("konten", $pilihan_jawaban->konten) }}</textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("konten") }}
                    </span>
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
