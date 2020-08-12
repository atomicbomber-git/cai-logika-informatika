@extends("layouts.app")

@section("title", "Lihat Soal")

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
            <a href="{{ route("materi.soal.index", $soal->materi_id) }}">
                Soal
            </a>
        </span>
        <span class="breadcrumb-item active">
            Lihat Soal
        </span>
    </nav>

    <div>
        @include("messages")

        <h2> Soal: </h2>

        <div class="my-3">
            {!! $soal->konten !!}
        </div>

        <h2> Pembahasan: </h2>

        <div class="my-3">
            {!! $soal->pembahasan !!}
        </div>

        @isset($soal->jawaban_benar)
            <div class="alert alert-success">
                <div class="font-weight-bolder"> Jawaban: </div>
                {{ $soal->jawaban_benar->konten }}
            </div>
        @else
            <div class="alert alert-warning">
                Soal belum memiliki jawaban.
            </div>
        @endisset
    </div>

    <script>
        window.onload = function () {
            window.displayTrixAttachments()
        }
    </script>
@endsection
