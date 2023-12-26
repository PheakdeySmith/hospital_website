<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('dashboard_assets') }}/images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow" href="{{ route('dashboard.index' )}}">
                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('appointments.index' )}}">
                        <i class="fas fa-table"></i>Manage Appointment</a>
                </li>
                <li>
                    <a href="{{ route('contacts.index' )}}">
                        <i class="fas fa-table"></i>Manage Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
