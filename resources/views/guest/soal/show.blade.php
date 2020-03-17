@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 text-primary mb-1">
                    <a class="text-decoration-none" href="{{ route("guest.materi.index") }}">
                        {{ $soal->materi->judul }}
                    </a>
                </h2>

                <h1 class="h3 font-weight-bolder">
                    SOAL #{{ $soal->urutan }}
                </h1>

                <article>
                    <p class="lead">
                        {!! $soal->konten !!}
                    </p>

                    <div data-toggle-answer class="d-flex justify-content-end">
                        <button type="button" class="btn btn-info">
                            <span data-toggle-answer-label> Tampilkan Jawaban </span>
                            <i class="fas fa-question-circle"></i>
                        </button>
                    </div>

                    <div data-answer class="alert alert-success d-none mt-3">
                        <span class="font-weight-bold"> Jawaban: </span>
                        {{ $soal->jawaban_benar->konten }}
                    </div>
                </article>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div>
                    @if($prev_soal !== null)
                        <a disabled
                           class="btn btn-outline-info"
                           href="{{ route("guest.soal.show", $prev_soal) }}">
                            <i class="fas fa-arrow-left"></i>
                            Soal Sebelumnya
                        </a>
                    @endif
                </div>

                <div>
                    @if($next_soal !== null)
                        <a disabled
                           class="btn btn-outline-info"
                           href="{{ route("guest.soal.show", $next_soal) }}">
                            Soal Selanjutnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section("footer-script")
    <script>
        window.onload = function () {
            const toggleAnswerButton = document.querySelector("[data-toggle-answer]");
            const answerDisplay = document.querySelector("[data-answer]");
            const toggleAnswerLabel = document.querySelector("[data-toggle-answer-label]");

            toggleAnswerButton.onclick = function () {
                answerDisplay.classList.toggle("d-none");

                if (answerDisplay.classList.contains("d-none")) {
                    toggleAnswerLabel.textContent = "Tampilkan Jawaban"
                }
                else {
                    toggleAnswerLabel.textContent = "Sembunyikan Jawaban"
                }
            };

            window.displayTrixAttachments()
        }
    </script>
@endsection
