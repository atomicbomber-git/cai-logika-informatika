@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 text-primary mb-1">
                    <a class="text-decoration-none"
                       href="{{ route("guest.materi.index") }}">
                        {{ $soal->materi->judul }}
                    </a>
                </h2>

                <h1 class="h3 font-weight-bolder">
                    QUIZ #{{ $quiz_data["current_soal_index"] + 1 }}
                </h1>

                <article>
                    <p class="lead">
                        {{ $soal->konten }}
                    </p>
                </article>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a class="btn btn-warning"
                   href="{{ route("guest.quiz.start", $quiz_data["materi"]->id)  }}">
                    Ulangi Progress
                    <i class="fas fa-retweet"></i>
                </a>

                <button id="check-button"
                        type="button"
                        class="btn btn-info">
                    Periksa
                    <i class="fas fa-question"></i>
                </button>
            </div>
        </div>
    </div>
@endsection

@section("footer-script")
    <script>
        window.onload = function () {
            const checkButton = document.querySelector("#check-button")

            checkButton.onclick = function () {
                fetch("/guest/quiz/verify")
                    .then(response => {
                        if (!response.ok) return
                        window.location.reload()
                    })
                    .catch(error => {
                        console.error(error)
                    })
            }
        }
    </script>
@endsection
