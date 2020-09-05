@extends("layouts.app")

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
        <span class="breadcrumb-item active">
            Soal
    </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Soal
        </h1>

        <p class="lead">
            "{{ $materi->judul }}"
        </p>

        @include("messages")

        <div>
            <div class="d-flex justify-content-end my-3">
                <a href="{{ route("materi.soal.create", $materi) }}"
                   class="btn btn-outline-info btn-sm">
                    Soal Baru
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> Urutan </th>
                        <th> Jawaban</th>
                        <th class="text-center"> Termasuk Latihan </th>
                        <th style="width: 15rem"> Kendali</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($materi->soal as $soal)
                        <tr>
                            <td> {{ $loop->iteration }}  </td>
                            <td> {{ $soal->urutan }}  </td>
                            <td> {{ $soal->jawaban_benar->konten ?? '-' }}  </td>
                            <td class="text-center">
                                @if($soal->termasuk_quiz)
                                    <i class="fas fa-check text-success"></i>
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                @endif
                            </td>
                            <td>
                                <div class="my-2">
                                    <a class="btn btn-outline-info btn-sm"
                                       href="{{ route("soal.show", $soal) }}">
                                        Lihat
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a class="btn btn-outline-info btn-sm"
                                       href="{{ route("soal.pilihan_jawaban.index", $soal) }}">
                                        Pilihan Jawaban
                                    </a>
                                </div>

                                <div class="my-2">
                                    <a class="btn btn-outline-info btn-sm"
                                       href="{{ route("soal.edit", $soal) }}">
                                        Ubah
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form class="d-inline-block form-delete"
                                          action="{{ route("soal.destroy", $soal) }}"
                                          method="post">
                                        @csrf
                                        @method("DELETE")

                                        <button class="btn btn-outline-danger btn-sm"
                                                type="submit">
                                            Hapus
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
