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
            Ubah Sub Materi
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Ubah Sub Materi
        </h1>

        @include("messages")

        <div>
            <h1> {{ $sub_materi->judul }} </h1>
            <hr>

            {!! $sub_materi->konten !!}

        </div>
    </div>
@endsection