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
            Lihat Sub Materi
        </span>
    </nav>

    <div>
        @include("messages")

        <div>
            <h1> {{ $sub_materi->judul }} </h1>
            <hr>

            {!! $sub_materi->konten !!}

        </div>
    </div>
@endsection
