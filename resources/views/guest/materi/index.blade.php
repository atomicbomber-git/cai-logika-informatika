@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <h1 class="h2">
            Daftar Materi
        </h1>

        @include("messages")

        <div class="row">
            @foreach($materis as $materi)
                <div class="col-lg-6 col-md-6 col-sm-12 py-2 px-2">
                    <div class="card"
                         style="width: 100%; height: 100%">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h2 class="h2 text-info">
                                    {{ $materi->judul }}
                                </h2>

                                <p>
                                    {{ $materi->deskripsi }}
                                </p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route("guest.belajar_materi", $materi) }}"
                                   class="btn btn-outline-info btn-sm mr-2">
                                    Belajar
                                    <i class="fas fa-book-open  "></i>
                                </a>

                                <a href="{{ route("guest.latihan_soal", $materi) }}"
                                   class="btn btn-outline-info btn-sm mr-2">
                                    Contoh Soal
                                </a>

                                <a href="{{ route("guest.quiz.start", $materi) }}"
                                   class="btn btn-outline-info btn-sm mr-2">
                                    Quiz
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
