@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="h2 font-weight-bolder">
                    Anda Telah Menyelesaikan Quiz
                </h1>

                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="card text-white bg-success">
                            <div class="card-body h2">
                                <i class="fas fa-check-circle"></i>
                                {{ $quiz_data[\App\QuizEngine::TOTAL_CORRECT_KEY] }}
                                Jawaban Benar
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card text-white bg-danger">
                            <div class="card-body h2">
                                <i class="fas fa-times-circle"></i>
                                {{ $quiz_data[\App\QuizEngine::SOALS_KEY]->count() - $quiz_data[\App\QuizEngine::TOTAL_CORRECT_KEY] }}
                                Jawaban Salah
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-around">
                <div>
                    <a class="btn btn-warning"
                       href="{{ route("guest.quiz.start", $quiz_data["materi"]->id)  }}">
                        Ulangi Quiz
                        <i class="fas fa-retweet"></i>
                    </a>
                </div>

                <div>
                    <a class="btn btn-primary"
                       href="{{ route("guest.sub_materi.show", $quiz_data["materi"]->first_sub_materi->id) }}">
                        Belajar Materi
                        <i class="fas fa-book"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
