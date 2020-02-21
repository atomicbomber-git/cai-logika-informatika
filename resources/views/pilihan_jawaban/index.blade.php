@extends("layouts.app")

@section("content")
    <nav class="breadcrumb">
        <a class="breadcrumb-item"
           href="">
            {{ config("app.name") }}
        </a>
        <span class="breadcrumb-item">
            <a href="{{ route("materi.soal.index", $soal->materi_id) }}">
                Soal
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

        <blockquote class="blockquote">
            <p>
                <span class="font-weight-bold"> Soal: </span> {{ $soal->konten }}
            </p>
        </blockquote>

        @include("messages")

        <div>
            <div class="d-flex justify-content-end my-3">
                <a href="{{ route("soal.pilihan_jawaban.create", $soal) }}"
                   class="btn btn-outline-info btn-sm">
                    Pilihan Jawaban Baru
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> Konten</th>
                        <th class="text-center"> Jawaban Benar?</th>
                        <th> Kendali</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($soal->pilihan_jawaban as $pilihan_jawaban)
                        <tr>
                            <td> {{ $loop->iteration }}  </td>
                            <td> {{ $pilihan_jawaban->konten }}  </td>
                            <td class="text-center">
                                @if(($soal->jawaban_benar->id ?? null) === $pilihan_jawaban->id)
                                    <span class="badge badge-success"> Jawaban Benar </span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-outline-info btn-sm"
                                   href="{{ route("pilihan_jawaban.edit", $pilihan_jawaban) }}">
                                    Ubah
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form
                                    class="d-inline-block"
                                    method="post"
                                    action="{{ route("pilihan_jawaban.tandai_jawaban_benar", $pilihan_jawaban) }}">
                                    @csrf
                                    @method("PUT")

                                    <button class="btn btn-outline-info btn-sm"
                                            type="submit">
                                        Tandai Jawaban Benar
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>


                                <form class="d-inline-block"
                                      method="POST"
                                      action="{{ route("pilihan_jawaban.destroy", $pilihan_jawaban) }}">
                                    @csrf
                                    @method("DELETE")

                                    <button class="btn btn-sm btn-outline-danger"
                                            type="submit">
                                        Delete
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
