@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 text-primary mb-1">
                    {{ $sub_materi->materi->judul }}
                    <br/>
                </h2>

                <h1 class="h2">
                    {{ $sub_materi->judul }}
                </h1>

                <hr/>

                <article>
                    {!! $sub_materi->konten !!}
                </article>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <div>
                    @if($prev_sub_materi !== null)
                        <a disabled
                           class="btn btn-outline-info"
                           href="{{ route("guest.sub_materi.show", $prev_sub_materi) }}">
                            <i class="fas fa-arrow-left"></i>
                            Sub Materi Sebelumnya
                        </a>
                    @endif
                </div>

                <div>
                    @if($next_sub_materi !== null)
                        <a disabled
                           class="btn btn-outline-info"
                           href="{{ route("guest.sub_materi.show", $next_sub_materi) }}">
                            Sub Materi Selanjutnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
