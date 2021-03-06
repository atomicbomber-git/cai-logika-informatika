@extends("layouts.app-guest")

@section("title", "Ringkasan")

@section("content")
    <div class="container">
        <h1 class="h1 mb-3">
            Ringkasan
        </h1>

        @include("messages")

        <div>
            {!! $informasi->konten !!}
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route("informasi.show", \App\Informasi::PENUTUP) }}" class="btn btn-warning">
                Penutup
                <i class="fas fa-arrow-circle-right  "></i>
            </a>
        </div>
    </div>
@endsection

@section("footer-script")
    <script>
        jQuery(function () {
            window.displayTrixAttachments()
        })
    </script>
@endsection