@extends("layouts.app")

@section("title", "Soal Baru")

@section("content")
    <nav class="breadcrumb">
        <a class="breadcrumb-item"
           href="">
            {{ config("app.name") }}
        </a>
        <span class="breadcrumb-item">
            <a href="{{ route("materi.soal.index", $materi) }}">
                Soal
            </a>
        </span>
        <span class="breadcrumb-item active">
            Soal Baru
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Soal Baru
        </h1>

        @include("messages")

        <div>
            <form action="{{ route("materi.soal.store", $materi) }}"
                  method="post">
                @csrf

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
                        rows="2">{{ old("konten") }}</textarea>
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
                        value="{{ old("urutan", $nextUrutan) }}"
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
                        Tambahkan
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
