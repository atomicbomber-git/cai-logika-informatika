@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <div class="card"
             x-data="{
                'pilihan_jawaban_id': null,
                'errors': {},
             }"
        >
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
                                        </div>

                                        <div class="d-flex justify-content-end align-items-center">
                                            <i
                                                x-show.transition=" {{ $pilihan_jawaban->id }} === pilihan_jawaban_id"
                                                class="fas fa-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <template x-for="errorKey in Object.keys(errors)"
                              :key="errorKey">
                        <div class="alert alert-danger d-block">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span x-text="errors[errorKey][0]"></span>
                        </div>
                    </template>
                </article>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center">
                <a class="btn btn-warning"
                   href="{{ route("guest.quiz.start", $quiz_data["materi"]->id)  }}">
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
                             aria-valuemax="{{ $quiz_data["soals"]->count() }}">
                        </div>
                    </div>
                </div>

                <button id="check-button"
                        type="button"
                        class="btn btn-info"
                        @click="
                            axios.post(
                                `/guest/quiz/verify`,
                                { 'pilihan_jawaban_id': pilihan_jawaban_id },
                                { headers: { 'Accept': 'application/json' }}
                            )
                            .then(response => {
                                let text = '';
                                let icon = '';

                                switch (response.data.status) {
                                    case 'incorrect_answer': {
                                        text = 'Jawaban Salah';
                                        icon = 'warning';
                                        break
                                    }
                                    case 'correct_answer': {
                                        text = 'Jawaban Benar';
                                        icon = 'success';
                                        break
                                    }
                                    default: {
                                        text = 'Server Error';
                                        icon = 'error';
                                    }
                                }

                                Swal.fire({
                                    title: 'Pesan',
                                    text: text,
                                    icon: icon,
                                })
                                .then(ok => {
                                    window.location.reload()
                                })
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
