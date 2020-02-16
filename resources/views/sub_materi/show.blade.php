@extends("layouts.app")

@section("title", "Tambah Sub Materi")

@section("content")
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="">
            {{ config("app.name") }}
        </a>
        <span class="breadcrumb-item">
            <a href="{{ route("materi.index") }}">
                Materi
            </a>
        </span>
        <span class="breadcrumb-item">
            <a href="{{ route("materi.sub_materi.index", $sub_materi->materi_id) }}">
                Sub Materi
            </a>
        </span>
        <span class="breadcrumb-item active">
            Lihat Sub Materi
        </span>
    </nav>

    <div>
        @include("messages")

        <div>
            <h1> {{ $sub_materi->judul }} </h1>
            <hr>

            {!! $sub_materi->konten !!}

        </div>
    </div>

    <script>
        window.onload = function () {
            function createMediaElement(attachmentData) {
                let sourceElement = null;

                switch (true) {
                    case (attachmentData.contentType.indexOf("audio") !== -1):
                        const audioElement = document.createElement("audio");
                        audioElement.setAttribute("controls", null);
                        audioElement.style.width = "100%";

                        sourceElement = document.createElement("source");
                        sourceElement.setAttribute("src", attachmentData.url);
                        audioElement.appendChild(sourceElement);

                        return audioElement;
                    case (attachmentData.contentType.indexOf("video") !== -1):
                        const videoElement = document.createElement("video");
                        videoElement.setAttribute("controls", null);
                        videoElement.style.width = "100%";

                        sourceElement = document.createElement("source");
                        sourceElement.setAttribute("src", attachmentData.url);
                        videoElement.appendChild(sourceElement);

                        return videoElement
                    default:
                        throw new Error(`Unknown media type: ${attachmentData.contentType}`);
                }
            }

            const attachmentNodes = document.querySelectorAll("figure[data-trix-attachment]");

            for (let i = 0; i < attachmentNodes.length; ++i) {
                const attachmentData = JSON.parse(attachmentNodes[i].dataset.trixAttachment);
                attachmentNodes[i].parentNode.insertBefore(createMediaElement(attachmentData), attachmentNodes[i].nextSibling);
                attachmentNodes[i].remove();
            }
        }
    </script>
@endsection
