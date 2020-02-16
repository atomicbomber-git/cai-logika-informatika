@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($materis as $materi)
                <div class="col-lg-6 col-md-6 col-sm-12 py-2 px-2">
                    <div class="card" style="width: 100%; height: 100%">
                        <div class="card-body">
                            <h1 class="h2 text-info">
                                {{ $materi->judul }}
                            </h1>

                            <p>
                                {{ $materi->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
