@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="h2 font-weight-bolder">
                    Anda Telah Menyelesaikan Quiz
                </h1>

                @if($correct_percentage >= 70.0)
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <p class="font-weight-bolder h3 mb-1"> Selamat! </p>
                            <p>
                                Anda berhasil menjawab {{ $correct_percentage }}% dari seluruh soal yang
                                diujikan.
                            </p>
                        </div>
                    </div>
                @else
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <p class="font-weight-bolder h3 mb-1"> Maaf. </p>
                            <p>
                                Anda hanya berhasil menjawab {{ $correct_percentage }}% dari seluruh soal yang
                                diujikan. Anda disarankan untuk mempelajari ulang materi yang diujikan.
                            </p>
                        </div>
                    </div>
                @endif

                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="card border-success text-success">
                            <div class="card-body h2">
                                <i class="fas fa-check-circle"></i>
                                {{ $quiz_data[\App\QuizEngine::TOTAL_CORRECT_KEY] }}
                                Jawaban Benar
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger text-danger">
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
                       href="{{ route("guest.quiz.start", $quiz_data["materi"])  }}">
                        Ulangi Quiz
                        <i class="fas fa-retweet"></i>
                    </a>
                </div>

                <div>
                    @if($next_materi)
                        <a class="btn btn-primary"
                           href="{{ route("guest.belajar_materi", $next_materi->id) }}">
                            Materi Selanjutnya
                            <i class="fas fa-book"></i>
                        </a>
                    @else
                        <a href="{{ route("informasi.show", \App\Informasi::RINGKASAN) }}" class="btn btn-primary">
                            Ringkasan
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
