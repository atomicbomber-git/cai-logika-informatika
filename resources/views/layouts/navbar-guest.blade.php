<nav class="navbar navbar-expand-sm navbar-dark"
    style="background-color: #3490dc"
    >
    <div class="container">
        <a class="navbar-brand"
           href="{{ route("guest.materi.index") }}">
            {{ config("app.name") }}
        </a>
        <button class="navbar-toggler d-lg-none"
                type="button"
                data-toggle="collapse"
                data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
             id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route("guest.home")  }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route("guest.bantuan")  }}">
                        <i class="fas fa-question"></i>
                        Bantuan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route("guest.materi.index")  }}">
                        <i class="fas fa-book"></i>
                        Materi
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
