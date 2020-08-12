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

            <a class="nav-link {{ \Illuminate\Support\Facades\Route::is("ringkasan.*") ? "active" : ""  }}"
               href="{{ route("ringkasan.edit") }}">
                Ringkasan

                @if(\Illuminate\Support\Facades\Route::is("ringkasan.*") ? "active" : "")
                    <span class="sr-only">(current)</span>
                @endif
            </a>
        </li>
    </ul>
</nav>
