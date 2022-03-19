<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" style="overflow: hidden">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.dashboard.index') }}" aria-expanded="false"><i
                            class="me-3 fa fa-home fa-fw" aria-hidden="true"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.students.index')}}" aria-expanded="false">
                        <i class="me-3 fa fa-users" aria-hidden="true"></i><span class="hide-menu">Students</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.professors.index') }}" aria-expanded="false"><i class="me-3 fa fa-user"
                            aria-hidden="true"></i><span class="hide-menu">Professors</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.projects.index') }}" aria-expanded="false"><i class="me-3 fas fa-book"
                            aria-hidden="true"></i><span class="hide-menu">Projects</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.categories.index') }}" aria-expanded="false"><i class="me-3 fa fa-globe"
                            aria-hidden="true"></i><span class="hide-menu">Categories</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.collegues.index') }}" aria-expanded="false"><i class="me-3 fas fa-graduation-cap"
                            aria-hidden="true"></i><span class="hide-menu">Collegues</span></a></li>

                {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
                        aria-expanded="false"><i class="me-3 fas fa-comment" aria-hidden="true"></i><span
                            class="hide-menu">Comments</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
                        aria-expanded="false"><i class="me-3 fas fa-star" aria-hidden="true"></i><span
                            class="hide-menu">Rates</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
                        aria-expanded="false"><i class="me-3 fas fa-eye" aria-hidden="true"></i><span
                            class="hide-menu">Views</span></a></li> --}}

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="404.html"
                        aria-expanded="false"><i class="me-3 fas fa-cogs" aria-hidden="true"></i><span
                            class="hide-menu">Settings</span></a></li>


            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
