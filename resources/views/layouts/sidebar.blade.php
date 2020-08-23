<nav class="nav navbar-light col-md-2 flex-column">
    <div class="navbar-text">
        MANAJEMEN DATA
    </div>

    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ \Illuminate\Support\Facades\Route::is("materi.*") ? "active" : "" }}"
               href="{{ route("materi.index") }}">
                Materi

                @if(\Illuminate\Support\Facades\Route::is("materi.*") ? "active" : "")
                    <span class="sr-only">(current)</span>
                @endif
            </a>

            @foreach (\App\Informasi::query()->get() as $informasiData)
                <a class="nav-link {{ (\Illuminate\Support\Facades\Route::is("informasi.*") && $informasi->id === $informasiData->id) ? "active" : ""  }}"
                   href="{{ route("informasi.edit", $informasiData) }}">
                    {{ \Illuminate\Support\Str::title($informasiData->id) }}
                    @if((\Illuminate\Support\Facades\Route::is("informasi.*") && $informasi->id === $informasiData->id) ? "active" : "")
                        <span class="sr-only">(current)</span>
                    @endif
                </a>
            @endforeach

{{--            <a class="nav-link {{ \Illuminate\Support\Facades\Route::is("ringkasan.*") ? "active" : ""  }}"--}}
{{--               href="{{ route("ringkasan.edit") }}">--}}
{{--                Ringkasan--}}

{{--                @if(\Illuminate\Support\Facades\Route::is("ringkasan.*") ? "active" : "")--}}
{{--                    <span class="sr-only">(current)</span>--}}
{{--                @endif--}}
{{--            </a>--}}
        </li>
    </ul>
</nav>
