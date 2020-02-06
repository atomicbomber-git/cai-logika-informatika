@extends("layouts.app")

@section("title", "Tambah Materi")

@section("content")
    <div>
        <div class="mb-5">
            <h1 class="text-2xl font-bold">
                Tambah Materi
            </h1>
            <hr>
        </div>

        @include("messages")

        <div>
            <form action="{{ route("materi.store") }}"
                  method="post">
                @csrf

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2"
                           for="judul">
                        Judul
                    </label>

                    <textarea class="{{ $errors->has("judul") ? "border-red-500" : "" }} shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="judul"
                              name="judul"
                              placeholder="Judul"
                              cols="30"
                              rows="10">{{ $materi->judul }}</textarea>

                    <p class="text-red-500 text-xs italic">
                        {{ $errors->first("judul") }}
                    </p>

                </div>

                <div class="flex justify-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                        Tambah Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
