<nav class="nav navbar-light bg-light flex-column">
    <span class="navbar-text">
        MANAJEMEN DATA
    </span>

    <ul class="navbar-nav nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ \Illuminate\Support\Facades\Route::is("materi.*") ? "active" : ""  }}" href="{{ route("materi.index") }}">
                Materi
                <span
                    class="sr-only">
                        (current)
                </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route("permasalahan.index") }}">
                Permasalahan
                <span
                    class="sr-only">
                        (current)
                </span>
            </a>
        </li>
    </ul>
</nav>
