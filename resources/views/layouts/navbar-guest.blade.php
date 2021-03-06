<nav class="navbar navbar-expand-sm navbar-dark"
     style="background-color: #000000"
>
    <div class="container">
        <a class="navbar-brand text-uppercase font-weight-bolder"
           href="{{ route("guest.materi.index") }}"
        >
            {{ config("app.name") }}
        </a>
        <button class="navbar-toggler d-lg-none"
                type="button"
                data-toggle="collapse"
                data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
             id="collapsibleNavId"
        >
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-uppercase"
                       href="{{ route("guest.home")  }}"
                    >
                        <i class="fas fa-home"></i>
                        Mulai
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
