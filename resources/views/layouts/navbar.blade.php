<nav class="nav navbar-light bg-light flex-column">
    <span class="navbar-text">
        <i class="fas fa-list"></i>
        Manajemen Data
    </span>

    <ul class="navbar-nav nav-pills flex-column">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route("materi.index") }}">
                Materi
                <span
                    class="sr-only">
                        (current)
                </span>
            </a>

            <a class="nav-link" href="{{ route("permasalahan.index") }}">
                Permasalahan
                <span
                      class="sr-only">
                        (current)
                </span>
            </a>
        </li>
    </ul>

    <span class="navbar-text">
            <i class="fas fa-dollar-sign"></i>
            TRANSACTIONS
    </span>
</nav>
