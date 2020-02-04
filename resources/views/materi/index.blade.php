@extends("layouts.app")

@section("content")
    <div class="card">
        <div class="card-header">
            <i class="fas fa-list fa-sm"></i>
            Katalog Permasalahan
        </div>

        <div class="card-body">
            @include('messages')

            <table class="table table-sm table-bordered table-striped table-inverse">
                <thead class="thead-inverse">
                <tr>
                    <th> # </th>
                    <th> Judul </th>
                    <th> Kendali </th>
                </tr>
                </thead>
                <tbody>
                @foreach($materis ?? [] as $materi)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $materi->judul }} </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-outline-dark"
                               href="">
                                Ubah
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form class="d-inline-block" action="{{ route('materi.destroy', $materi) }}"
                                  method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-outline-danger btn-sm" type="submit">
                                    Hapus
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
@endsection
