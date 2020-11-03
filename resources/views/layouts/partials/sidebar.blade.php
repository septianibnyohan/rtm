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
                        <a class="nav-link" href="{{ config('app.url') }}/summary" aria-expanded="false" aria-controls="tables">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid menu-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                                        <span class="menu-title">Download Summary</span>
                                                </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ config('app.url') }}/suhu" aria-expanded="false" aria-controls="tables">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid menu-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                                            <span class="menu-title">Download Suhu</span>
                                                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ config('app.url') }}/in" aria-expanded="false" aria-controls="tables">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid menu-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                                            <span class="menu-title">Download IN</span>
                                                    </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ config('app.url') }}/out" aria-expanded="false" aria-controls="tables">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid menu-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                                            <span class="menu-title">Download OUT</span>
                                                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ config('app.url') }}/setting" aria-expanded="false" aria-controls="tables">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings menu-icon"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                                            <span class="menu-title">Setting</span>
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