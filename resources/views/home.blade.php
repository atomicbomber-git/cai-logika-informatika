@extends('layouts.app-guest')

@section('content')
    <div
            x-data="{
                currentPage: 'front',
            }"
            class="text-center h1"
    >
        <div class="row justify-content-center align-items-center flex-wrap">

            <div x-show="currentPage === 'front'">
                <div  class="jumbotron text-left" style="width: 100%">
                    <h1 class="display-4 text-primary"> Selamat Datang </h1>
                    <p class="lead"> Di situs ini Anda dapat belajar dan mengevaluasi kemampuan Anda dalam materi Logika Informatika </p>
                </div>


                <div class="col-md-12 d-flex flex-wrap justify-content-center"

                     x-on:click="currentPage = 'inside'"
                >
                    <div class="card"
                         style="cursor: grab; width: 300px"
                    >
                        <div class="card-body">
                            <div class="my-2"><i class="fas fa-door-open "></i></div>
                            Mulai
                        </div>
                    </div>
                </div>
            </div>

            <div :class="{ 'd-none': currentPage !== 'inside' }"
                 class="col-md-6 my-3 d-none"
            >
                <div class="card">
                    <div class="card-body">
                        <div class="my-2"><i class="fas fa-sign"></i></div>
                        Tentang Aplikasi
                    </div>

                    <a href="{{ route("informasi.show", \App\Informasi::TENTANG_APLIKASI) }}"
                       class="stretched-link"
                    ></a>
                </div>
            </div>

            <div :class="{ 'd-none': currentPage !== 'inside' }"
                 class="col-md-6 my-3 d-none"
            >
                <div class="card">
                    <div class="card-body">
                        <div class="my-2"><i class="fas fa-question-circle "></i></div>
                        Bantuan

                        <a href="{{ route("informasi.show", \App\Informasi::BANTUAN) }}"
                           class="stretched-link"
                        ></a>
                    </div>
                </div>
            </div>

            <div :class="{ 'd-none': currentPage !== 'inside' }"
                 class="col-md-6 my-3 d-none"
            >
                <div class="card">
                    <div class="card-body">
                        <div class="my-2"><i class="fas fa-book "></i></div>
                        Materi

                        <a href="{{ route("guest.materi.index") }}"
                           class="stretched-link"
                        ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
