@extends("layouts.app")

@section("title", "Ubah Ringkasan")

@section("content")
    <div>
        <h1 class="h1 mb-3">
            Ubah Ringkasan
        </h1>

        @include("messages")

        <div>
            <form action="{{ route("ringkasan.update") }}"
                  method="post"
            >
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="konten">
                        Konten:
                    </label>

                    <input id="konten"
                           value="{{ old("konten", $ringkasan->konten) }}"
                           type="hidden"
                           name="konten"
                    >
                    <trix-editor
                            style="height: 400px"
                            class="{{ $errors->has("konten") ? "is-invalid" : "" }}"
                                 input="konten"
                    ></trix-editor>
                    <span class="invalid-feedback">
                        {{ $errors->first("konten") }}
                    </span>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit"
                            class="btn btn-outline-info"
                    >
                        Perbarui
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection