@extends("layouts.app")

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
        <span class="breadcrumb-item active">
            Pilihan Jawaban
    </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Pilihan Jawaban
        </h1>

        @include("messages")

        <div>
            <div class="d-flex justify-content-end my-3">
                <a href="{{ route("soal.pilihan_jawaban.create", $soal) }}" class="btn btn-outline-info btn-sm">
                    Pilihan Jawaban Baru
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th style="width: 30rem"> Konten </th>
                        <th> Jawaban </th>
                        <th style="width: 10rem"> Kendali </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($soal->pilihan_jawaban as $pilihan_jawaban)
                        <tr>
                            <td> {{ $loop->iteration }}  </td>
                            <td> {{ $soal->konten }}  </td>
                            <td> {{ $soal->jawaban_benar->konten ?? '-' }}  </td>
                            <td>
                                <div class="my-2">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route("soal.pilihan_jawaban.index", $soal) }}">
                                        Pilihan Jawaban
                                    </a>
                                </div>

                                <div class="my-2">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route("soal.edit", $soal) }}">
                                        Ubah
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form class="d-inline-block" action="{{ route("soal.destroy", $soal) }}" method="post">
                                        @csrf
                                        @method("DELETE")

                                        <button class="btn btn-outline-danger btn-sm" type="submit">
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
