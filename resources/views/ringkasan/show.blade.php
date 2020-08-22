@extends("layouts.app-guest")

@section("title", "Ringkasan")

@section("content")
    <div class="container">
        <h1 class="h1 mb-3">
            Ringkasan
        </h1>

        @include("messages")

        <div>
            {!! $ringkasan->konten !!}
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