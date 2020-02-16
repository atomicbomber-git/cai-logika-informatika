<nav class="navbar navbar-expand-sm navbar-dark"
    style="background-color: #7a3b3b"
    >
    <div class="container">
        <a class="navbar-brand"
           href="{{ \App\Providers\RouteServiceProvider::getHomeRoute() }}">
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

            </ul>

            @auth
                <form class="d-inline-block"
                      method="post"
                      action="{{ route("logout") }}">
                    @csrf

                    <button class="btn btn-sm btn-outline-warning">
                        Log Out
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route("login") }}"
                   class="btn btm-sm btn-outline-light">
                    Log In
                    <i class="fas fa-sign-in-alt"></i>
                </a>
            @endguest
        </div>
    </div>
</nav>
