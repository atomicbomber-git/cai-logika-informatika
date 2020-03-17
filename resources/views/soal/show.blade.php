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

        <div class="mb-4">
            {!! $soal->konten !!}
        </div>

        <div class="alert alert-success">
            <div class="font-weight-bolder"> Jawaban: </div>
            {{ $soal->jawaban_benar->konten }}
        </div>
    </div>

    <script>
        window.onload = function () {
            window.displayTrixAttachments()
        }
    </script>
@endsection
