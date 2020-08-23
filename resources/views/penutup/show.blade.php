@extends("layouts.app-guest")

@section("title", "Penutup")

@section("content")
    <div class="container">
        <h1 class="h1 mb-3">
            Penutup
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