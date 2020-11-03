<nav class="navbar">
    <div class="page-header-container">
        <div class="page-header-main">
            <div class="page-title">{{ $page_title }}</div>
            <div class="header-breadcrumb">
                <a href="#"><i data-feather="airplay"></i> Home</a>
                <a href="#">{{ $page_title }}</a>
            </div>
        </div>
    </div>
    <div class="navbar-menu-container">
        <!-- partial:../../partials/_navbar.html -->
        <div class="navbar-brand-container">
            <a class="brand-logo" href="../dashboards/index.html">
            {{ config('app.name')}}
                                    </a>
        </div>
        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item nav-profile">
                <a class="nav-link" href="#" id="profileToolbar">
                                                    <img src="{{ auth()->user()->getAvatar() }}" alt="Profile Pic" />
                                            </a>
            </li>
            <li class="nav-item mobile-sidebar">
                <button class="nav-link navbar-toggler navbar-toggler-right align-self-center" type="button" data-toggle="flt-sidebar">
                                                    <i class="fas fa-align-right"></i>
                                            </button>
            </li>
        </ul>
        <!-- partial -->
    </div>
</nav>