<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-brand">
            <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
            <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
            <a href="{{ route('redirects') }}">Description of the system </a>
        </div>

        <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form>

            <div id="navbar-menu">
                <ul class="nav navbar-nav">

                    <li>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <div class="input-group">
                                <button><i class="fa fa-power-off"></i></button>
                                {{-- <a href="{{ route('logout') }}" class="icon-menu"></a> --}}
                            </div>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>