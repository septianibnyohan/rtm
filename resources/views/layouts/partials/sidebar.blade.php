<div class="navbar-wrapper">
    <nav class="navbar-container flex-row" id="navbar">
        <div class="primary primary-sb">
            <div class="sub-header">
                <a class="brand-logo" href="../dashboards/index.html">
                    {{ config('app.name')}}
                                    </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="flt-sb">
                                            <i data-feather="align-right"></i>
                                    </button>
            </div>
            <div class="nav-wrapper">
                <ul class="nav">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ config('app.url') }}/home" aria-expanded="false" aria-controls="ui-dash">
                                                            <i data-feather="home" class="menu-icon"></i>
                                                            <span class="menu-title">Dashboard</span>
                                                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ config('app.url') }}/list-user" aria-expanded="false" aria-controls="ui-dash">
                                                            <i data-feather="users" class="menu-icon"></i>
                                                            <span class="menu-title">List User</span>
                                                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" aria-expanded="false" aria-controls="tables" 
                            onclick="document.getElementById('logout-form').submit()">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;Logout</span>
                                <form action="{{ route('logout') }}" method="POST" id='logout-form'>
                                @csrf
                                </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<nav class="navbar-mb-container flex-row" id="mobile-navbar">
    <div class="secondary">
        <div class="sub-header">
            <h4>{{ config('app.name')}}</h4>
        </div>
        <div class="nav-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ config('app.url') }}/home" aria-expanded="false" aria-controls="mb-ui-dash">
                            <span class="menu-title">Dashboards</span>
                    </a>
                    <a class="nav-link" href="{{ config('app.url') }}/summary" aria-expanded="false" aria-controls="mb-ui-dash">
                            <span class="menu-title">Download Summary</span>
                    </a>
                    <a class="nav-link" href="{{ config('app.url') }}/suhu" aria-expanded="false" aria-controls="mb-ui-dash">
                            <span class="menu-title">Download Suhu</span>
                    </a>
                    <a class="nav-link" href="{{ config('app.url') }}/in" aria-expanded="false" aria-controls="mb-ui-dash">
                            <span class="menu-title">Download IN</span>
                    </a>
                    <a class="nav-link" href="{{ config('app.url') }}/out" aria-expanded="false" aria-controls="mb-ui-dash">
                            <span class="menu-title">Download OUT</span>
                    </a>
                    <a class="nav-link" href="{{ config('app.url') }}/setting" aria-expanded="false" aria-controls="mb-ui-dash">
                            <span class="menu-title">Setting</span>
                    </a>
                    <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit()" aria-expanded="false" aria-controls="mb-ui-dash" >
                            <span class="menu-title">Logout</span>
                            <form action="{{ route('logout') }}" method="POST" id='logout-form'>
                            @csrf
                            </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>