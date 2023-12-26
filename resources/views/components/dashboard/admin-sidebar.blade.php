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
                    <a class="js-arrow" href="{{ route('admin_home' )}}">
                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.doctors.index' )}}">
                        <i class="fas fa-table"></i>Manage Doctor</a>
                </li>
                <li>
                    <a href="{{ route('admin.departments.index' )}}">
                        <i class="fas fa-table"></i>Manage Department</a>
                </li>
                <li>
                    <a href="{{ route('admin.treatments.index' )}}">
                        <i class="fas fa-table"></i>Manage Treatment</a>
                </li>
                <li>
                    <a href="{{ route('admin.appointments.index' )}}">
                        <i class="fas fa-table"></i>Manage Appointment</a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonials.index' )}}">
                        <i class="fas fa-table"></i>Manage Testimonial</a>
                </li>
                <li>
                    <a href="{{ route('admin.abouts.index' )}}">
                        <i class="fas fa-table"></i>Manage About</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
