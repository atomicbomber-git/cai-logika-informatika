@extends('layouts.app-guest')

@section('content')


    <div
            x-data="{
                currentPage: 'front',
            }"
            class="text-center h1"
    >


        <div class="row">
            <div class="col-md-12"
                 x-show="currentPage === 'front'"
                 x-on:click="currentPage = 'inside'"
            >
                <h1 class="h2 text-primary text-uppercase font-weight-bold my-3"> CAI Logika Informatika </h1>


                <div class="card"
                     style="cursor: grab"
                >
                    <div class="card-body">
                        <div class="my-2"><i class="fas fa-door-open "></i></div>
                        Mulai
                    </div>
                </div>
            </div>

            <div :class="{ 'd-none': currentPage !== 'inside' }"
                 class="col-md-6 my-3 d-none"
            >
                <div class="card">
                    <div class="card-body">
                        <div class="my-2"><i class="fas fa-sign"></i></div>
                        Pengantar
                    </div>

                    <a href="#"
                       class="stretched-link"
                    ></a>
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

            <div :class="{ 'd-none': currentPage !== 'inside' }"
                 class="col-md-6 my-3 d-none"
            >
                <div class="card">
                    <div class="card-body">
                        <div class="my-2"><i class="fas fa-wrench "></i></div>
                        Pengaturan

                        <a href="#"
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
                        <div class="my-2"><i class="fas fa-question-circle "></i></div>
                        Bantuan

                        <a href="{{ route("guest.bantuan") }}"
                           class="stretched-link"
                        ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
