@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <div class="card"
             x-data="{
                'pilihan_jawaban_id': null,
                'errors': {},
                'answered': false,
                'is_correct': false,
                'jawaban_benar_id': null,
             }"
        >
            <div class="card-body">
                <h2 class="h5 text-primary mb-1">
                    <a class="text-decoration-none"
                       href="{{ route("guest.materi.index") }}"
                    >
                        {{ $soal->materi->judul }}
                    </a>
                </h2>

                <h1 class="h3 font-weight-bolder">
                    QUIZ #{{ $quiz_data["current_soal_index"] + 1 }}
                </h1>

                <article>
                    <p class="lead">
                        {!! $soal->konten !!}
                    </p>

                    <div
                            class="row"
                    >
                        @foreach($soal->pilihan_jawaban as $pilihan_jawaban)
                            <div class="col-md-6 px-3">
                                <div class="alert"
                                     :class="{
                                        'alert-success': {{ $pilihan_jawaban->id }} === pilihan_jawaban_id,
                                        'alert-dark': {{ $pilihan_jawaban->id }} !== pilihan_jawaban_id
                                     }"
                                     @click="pilihan_jawaban_id = {{ $pilihan_jawaban->id }}"
                                >
                                    <div class="d-flex justify-content-between">
                                        <div>


                                            {{ $pilihan_jawaban->konten }}

                                            <div>
                                                <span
                                                        class="badge badge-primary my-2"
                                                        x-show="answered && jawaban_benar_id == {{ $pilihan_jawaban->id }}"
                                                        class="badge"
                                                >
                                                    Jawaban Benar
                                                </span>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end align-items-center">
                                            <i
                                                    x-show.transition=" {{ $pilihan_jawaban->id }} === pilihan_jawaban_id"
                                                    class="fas fa-check"
                                            ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <template x-for="errorKey in Object.keys(errors)"
                              :key="errorKey"
                    >
                        <div class="alert alert-danger d-block">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span x-text="errors[errorKey][0]"></span>
                        </div>
                    </template>

                    <div x-show="answered">
                        <div x-show="!is_correct"
                             class="alert alert-danger"
                        >
                            Maaf, jawaban Anda keliru
                        </div>

                        <div x-show="is_correct"
                             class="alert alert-success"
                        >
                            Selamat, jawaban Anda tepat
                        </div>
                    </div>


                    <div x-show="answered">
                        <hr>
                        <h4 class="text-uppercase font-weight-bold"> Pembahasan </h4>
                        {!! $soal->pembahasan !!}
                    </div>
                </article>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center">
                <a class="btn btn-warning"
                   href="{{ route("guest.quiz.start", $quiz_data["materi"]->id)  }}"
                >
                    Ulangi Progress
                    <i class="fas fa-retweet"></i>
                </a>

                <div class="flex-fill px-5">
                    <div class="font-weight-bolder mb-2 text-center">
                        <span class="text-dark font-weight-bolder text-uppercase">
                            {{ $quiz_data['current_soal_index'] }} / {{ $quiz_data['soals']->count() }} Soal Selesai
                            ({{ $quiz_data['total_correct'] }} Benar)
                        </span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-primary"
                             role="progressbar"
                             style="width: {{ $quiz_data['current_soal_index'] / $quiz_data["soals"]->count() * 100 }}%;"
                             aria-valuenow="{{ $quiz_data['current_soal_index'] }}"
                             aria-valuemin="0"
                             aria-valuemax="{{ $quiz_data["soals"]->count() }}"
                        >
                        </div>
                    </div>
                </div>

                <button
                        @click="window.location.reload()"
                        type="button"
                        class="btn btn-primary"
                        x-show="answered"
                >
                    Soal Selanjutnya
                </button>

                <button id="check-button"
                        type="button"
                        class="btn btn-info"
                        x-show="!answered"
                        @click="
                            axios.post(
                                `/guest/quiz/verify`,
                                { 'pilihan_jawaban_id': pilihan_jawaban_id },
                                { headers: { 'Accept': 'application/json' }}
                            )
                            .then(response => {
                                answered = true

                                switch (response.data.status) {
                                    case 'incorrect_answer': {
                                        is_correct = false
                                        jawaban_benar_id = response.data.jawaban_benar_id
                                        break
                                    }
                                    case 'correct_answer': {
                                        is_correct = true
                                        break
                                    }
                                    default: {
                                        alert('Terjadi masalah pada server.')
                                    }
                                }
                            })
                            .catch(error => {
                                errors = error.response.data.errors
                            })
                        "
                >
                    Periksa
                </button>
            </div>
        </div>
    </div>
@endsection
