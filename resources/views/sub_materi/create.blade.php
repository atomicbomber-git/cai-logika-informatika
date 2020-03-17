@extends("layouts.app")

@section("title", "Sub Materi Baru")

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
                        class="form-control {{ $errors->has("judul") ? "is-invalid" : "" }}"
                        name="judul"
                        id="judul"
                        cols="30"
                        rows="2">{{ old("judul") }}</textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("judul") }}
                    </span>
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

@section('footer-script')
    @include('sub_materi.footer_script')
@endsection
