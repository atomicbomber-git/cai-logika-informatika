<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand"
           href="#">
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

            <button class="btn btn-sm btn-outline-danger">
                Log Out
                <i class="fas fa-sign-out-alt"></i>
            </button>


        </div>
    </div>
</nav>
