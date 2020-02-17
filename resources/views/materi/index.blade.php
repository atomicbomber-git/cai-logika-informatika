@extends("layouts.app")

@section('title', 'Materi Baru')

@section("content")
    <nav class="breadcrumb">
        <a class="breadcrumb-item"
           href="">
            {{ config("app.name") }}
        </a>
        <span class="breadcrumb-item active">
            Materi
        </span>
    </nav>

    <div>
        <h1 class="h1 mb-3">
            Materi
        </h1>

        @include("messages")

        <div>
            <div class="d-flex justify-content-end my-3">
                <a href="{{ route("materi.create") }}"
                   class="btn btn-outline-info btn-sm">
                    Materi Baru
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th> Judul</th>
                        <th> Deskripsi</th>
                        <th> Kendali</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($materis as $materi)
                        <tr>
                            <td> {{ $materi->urutan }}  </td>
                            <td> {{ $materi->judul }}  </td>
                            <td style="width: 15rem;"> {{ $materi->deskripsi }}  </td>
                            <td>
                                <div class="mb-2">
                                    <a class="btn btn-outline-info btn-sm"
                                       href="{{ route("materi.sub_materi.index", $materi) }}">
                                        Sub Materi
                                    </a>

                                    <a class="btn btn-outline-info btn-sm"
                                       href="{{ route("materi.soal.index", $materi) }}">
                                        Soal Latihan
                                    </a>
                                </div>

                                <div>
                                    <a class="btn btn-outline-info btn-sm"
                                       href="{{ route("materi.edit", $materi) }}">
                                        Ubah
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form class="d-inline-block"
                                          action="{{ route("materi.destroy", $materi) }}"
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
