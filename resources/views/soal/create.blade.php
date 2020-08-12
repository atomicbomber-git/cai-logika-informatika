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

                    <input id="konten"
                           value="{{ old("konten") }}"
                           type="hidden"
                           name="konten">
                    <trix-editor class="{{ $errors->has("konten") ? "is-invalid" : "" }}"
                                 input="konten"></trix-editor>
                    <span class="invalid-feedback">
                        {{ $errors->first("konten") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="pembahasan">
                        Pembahasan:
                    </label>

                    <input id="pembahasan"
                           value="{{ old("pembahasan") }}"
                           type="hidden"
                           name="pembahasan"
                    >
                    <trix-editor class="{{ $errors->has("pembahasan") ? "is-invalid" : "" }}"
                                 input="pembahasan"
                    ></trix-editor>
                    <span class="invalid-feedback">
                        {{ $errors->first("pembahasan") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="termasuk_quiz"> Termasuk Soal Latihan: </label>
                    <select
                            id="termasuk_quiz"
                            type="text"
                            class="form-control @error("termasuk_quiz") is-invalid @enderror"
                            name="termasuk_quiz"
                    >
                        <option value="1"
                                {{ old("termasuk_quiz") == "1" ? "selected" : "" }}
                        > Termasuk
                        </option>
                        <option value="0"
                                {{ old("termasuk_quiz") == "0" ? "selected" : "" }}
                        > Tidak Termasuk
                        </option>

                    </select>
                    @error("termasuk_quiz")
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="urutan"> Urutan: </label>
                    <input
                        id="urutan"
                        type="number"
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
