@extends("layouts.app-guest")

@section("title", "Bantuan")

@section("content")
    <div class="container">
        <h1 class="h1 mb-3 text-light">
            Bantuan
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