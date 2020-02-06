@extends("layouts.app")

@section("content")
    {{--    <nav class="breadcrumb">--}}
    {{--        <a class="breadcrumb-item"--}}
    {{--           href="">--}}
    {{--            {{ config("app.name") }}--}}
    {{--        </a>--}}
    {{--        <span class="breadcrumb-item active">--}}
    {{--            Materi--}}
    {{--        </span>--}}
    {{--    </nav>--}}

    <div>
        <div class="mb-5">
            <h1 class="text-2xl  font-bold">
                Materi
            </h1>
            <hr>
        </div>

        @include("messages")

        <div>
            <div class="flex justify-end my-2">
                <a href="{{ route("materi.create") }}"
                   class="inline-block bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 border border-blue-700 rounded"
                >
                    Tambah Data
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <table class="w-full">
                <thead>
                <tr>
                    <th class="border px-2 py-1"> #</th>
                    <th class="border px-2 py-1"> Nama</th>
                    <th class="border px-2 py-1"> Kendali</th>
                </tr>
                </thead>

                <tbody>
                @foreach($materis as $materi)
                    <tr>
                        <td class="border px-2 py-1"> {{ $loop->iteration }} </td>
                        <td class="border px-2 py-1"> {{ $materi->judul }} </td>
                        <td class="border px-2 py-1">

                            <a
                                    href="{{ route("materi.edit", $materi) }}"
                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 border border-blue-700 rounded">
                                Ubah
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form class="inline-block" action="{{ route("materi.destroy", $materi) }}"
                                  method="post">
                                @method("DELETE")
                                @csrf

                                <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 border border-red-700 rounded">
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
