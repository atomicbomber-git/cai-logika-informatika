@extends("layouts.app-guest")

@section("title", "Pengantar")

@section("content")
    <div class="container text-light">
        <h1 class="h1 mb-3">
            Tentang Aplikasi
        </h1>

        @include("messages")

        <div>
            {!! $informasi->konten !!}
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