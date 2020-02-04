@extends("layouts.app")

@section("content")
    <div class="card">
        <div class="card-header">
            <i class="fas fa-list fa-sm"></i>
            Katalog Permasalahan
        </div>

        <div class="card-body">
            <table class="table table-sm table-bordered table-striped table-inverse">
                <thead class="thead-inverse">
                <tr>
                    <th> # </th>
                    <th> Judul </th>
                    <th> Kendali </th>
                </tr>
                </thead>
                <tbody>
                @foreach($permasalahans ?? [] as $permasalahan)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $permasalahan->judul }} </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-outline-dark"
                               href="">
                                Ubah
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a class="btn btn-sm btn-outline-danger"
                               href="">
                                Hapus
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
