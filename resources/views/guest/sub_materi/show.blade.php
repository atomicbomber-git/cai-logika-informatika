@extends('layouts.app-guest')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 text-primary mb-1">
                    <a class="text-decoration-none"
                       href="{{ route("guest.materi.index") }}"
                    >
                        {{ $sub_materi->materi->judul }}
                    </a>
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
                           href="{{ route("guest.sub_materi.show", $prev_sub_materi) }}"
                        >
                            <i class="fas fa-arrow-left"></i>
                            Sub Materi Sebelumnya
                        </a>
                    @endif
                </div>

                <div>
                    @if($next_sub_materi !== null)
                        <a
                                class="btn btn-outline-info"
                                href="{{ route("guest.sub_materi.show", $next_sub_materi) }}"
                        >
                            Sub Materi Selanjutnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @else

                        <a
                                class="btn btn-outline-primary"
                                href="{{ route("guest.latihan_soal", $sub_materi->materi_id) }}"
                        >
                            Latihan Soal
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section("footer-script")
    <script>
        jQuery(function () {
            window.displayTrixAttachments()
        })
    </script>
@endsection

