
<style>
    /* Sidebar Styling */
    .sb-sidenav {
        background-color: rgb(33 37 41); /* Dark blue background */
        color: #ffffff; /* White text */
    }

    .sb-sidenav .nav-link {
        color: #ffffff; /* White text for nav links */
    }

    .sb-sidenav .nav-link:hover {
        background-color: #c70303; /* Slightly lighter blue on hover */
        color: #ffffff;
    }

    .sb-sidenav .nav-link.active-link {
        background-color: #9e0000; /* Active link background */
        color: #ffffff; /* Active link text color */
    }

    .sb-sidenav-menu-heading {
        color: #ffffff; /* White heading text */
        font-weight: bold;
    }
</style>

<div id="layoutSidenav_nav" style="width: 250px;">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('home')}}"> --}}
                    <div class="sb-sidenav-menu-heading text-light">Insaf Medical Complex Menu</div>
                    <a class="nav-link {{ request()->routeIs('home') ? 'active-link' : '' }}" href="{{route('home')}}">
                             <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                 Dashboard
                      </a>
                        {{-- Users Section --}}
                        @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->usertype == 1)
                                <div class="sb-sidenav-menu-heading text-light">Users</div>

                                <!-- Users Menu -->
                                <a class="nav-link text-light" href="#" onclick="toggleSubMenu('users')">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                                    Users
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div id="users" style="display: {{ request()->routeIs('users.*') ? 'block' : 'none' }}; padding-left: 20px;">
                                    <a class="nav-link {{ request()->routeIs('users.create') ? 'active-link' : '' }}" href="{{route('users.create')}}">Add User</a>
                                    <a class="nav-link {{ request()->routeIs('users.index') ? 'active-link' : '' }}" href="{{route('users.index')}}">Manage Users</a>

                                </div>

                                <!-- Doctors Menu -->
                                <a class="nav-link text-light" href="#" onclick="toggleSubMenu('doctor')">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                                    Doctors
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div id="doctor" style="display: {{ request()->routeIs('doctor.*') ? 'block' : 'none' }}; padding-left: 20px;">
                                    <a class="nav-link {{ request()->routeIs('doctor.create') ? 'active-link' : '' }}" href="{{route('doctor.create')}}">Add Doctor</a>
                                    <a class="nav-link {{ request()->routeIs('doctor.index') ? 'active-link' : '' }}" href="{{route('doctor.index')}}">Manage Doctors</a>
                                </div>
                            @endif
                        @endauth
                        @endif

                        {{-- Appointment Section --}}
                        @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->usertype == 4 || Auth::user()->usertype == 1)
                                <div class="sb-sidenav-menu-heading text-light">Manages</div>

                                <!-- Appointments Menu -->
                                <a class="nav-link text-light" href="#" onclick="toggleSubMenu('appointmentsMenu')">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-check"></i></div>
                                    Appointments
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div id="appointmentsMenu" style="display: {{ request()->routeIs('showappointment') ? 'block' : 'none' }}; padding-left: 20px;">
                                    <a class="nav-link {{ request()->routeIs('showappointment') ? 'active-link' : '' }}" href="{{route('showappointment')}}">Manage Appointments</a>
                                </div>

                                <!-- User's Query Menu -->
                                <a class="nav-link text-light" href="#" onclick="toggleSubMenu('usersQueryMenu')">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-circle-question"></i></div>
                                    User's Query
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div id="usersQueryMenu" style="display: {{ request()->routeIs('contact.index') ? 'block' : 'none' }}; padding-left: 20px;">
                                    <a class="nav-link {{ request()->routeIs('contact.index') ? 'active-link' : '' }}" href="{{route('contact.index')}}">View Query</a>
                                </div>
                            @endif
                        @endauth
                        @endif
            {{-- Pharmacy & Lab Tests --}}
                @if(Route::has('login'))
                @auth
                    @if(Auth::user()->usertype == 5 || Auth::user()->usertype == 1)
                        <!-- Pharmacy Section -->
                        <div class="sb-sidenav-menu-heading text-light">Pharmacy</div>
                        <a class="nav-link text-light" href="#" onclick="toggleSubMenu('pharmacyMenu')">
                            <div class="sb-nav-link-icon"><i class="fas fa-pills"></i></div>
                            Pharmacy
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div id="pharmacyMenu" style="display: {{ request()->routeIs('pharmachy.*') || request()->routeIs('medi-order') ? 'block' : 'none' }}; padding-left: 20px;">
                            <a class="nav-link {{ request()->routeIs('pharmachy.create') ? 'active-link' : '' }}" href="{{route('pharmachy.create')}}">Add Medicines</a>
                            <a class="nav-link {{ request()->routeIs('pharmachy.index') ? 'active-link' : '' }}" href="{{route('pharmachy.index')}}">Manage Medicines</a>
                            <a class="nav-link {{ request()->routeIs('medi-order') ? 'active-link' : '' }}" href="{{route('medi-order')}}">Manage Order</a>
                        </div>

                        <!-- Laboratory Tests Section -->
                        <div class="sb-sidenav-menu-heading text-light">Laboratory Tests</div>
                        <a class="nav-link text-light" href="#" onclick="toggleSubMenu('labMenu')">
                            <div class="sb-nav-link-icon"><i class="fas fa-vials"></i></div>
                            Lab Tests
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div id="labMenu" style="display: {{ request()->routeIs('lab.*') ? 'block' : 'none' }}; padding-left: 20px;">
                            <a class="nav-link {{ request()->routeIs('lab.create') ? 'active-link' : '' }}" href="{{route('lab.create')}}">Add Test</a>
                            <a class="nav-link {{ request()->routeIs('lab.index') ? 'active-link' : '' }}" href="{{route('lab.index')}}">Manage Test</a>
                            <a class="nav-link {{ request()->routeIs('lab-order') ? 'active-link' : '' }}" href="{{route('lab-order')}}">Manage Order</a>
                        </div>
                    @endif
                @endauth
                @endif
           {{--    History--}}
           @if(Route::has('login'))
           @auth
               @if(Auth::user()->usertype == 2 || Auth::user()->usertype == 1)
                   <div class="sb-sidenav-menu-heading text-light">History</div>
                   <a class="nav-link {{ request()->routeIs('showhistory') ? 'active-link' : '' }}" href="{{route('showhistory')}}">
                       <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                       Appointment History
                   </a>
               @endif
           @endauth
           @endif
          {{-- Food Section --}}
            @if(Route::has('login'))
            @auth
                @if(Auth::user()->usertype == 3 || Auth::user()->usertype == 1)
                    <div class="sb-sidenav-menu-heading text-light">Food</div>

                    <!-- Food Menu -->
                    <a class="nav-link text-light" href="#" onclick="toggleSubMenu('foodMenu')">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-utensils"></i></div>
                        Food
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div id="foodMenu" style="display: {{ request()->routeIs('food.*') ? 'block' : 'none' }}; padding-left: 20px;">
                        <a class="nav-link {{ request()->routeIs('food.create') ? 'active-link' : '' }}" href="{{route('food.create')}}">Add Food</a>
                        <a class="nav-link {{ request()->routeIs('food.index') ? 'active-link' : '' }}" href="{{route('food.index')}}">Manage Food</a>
                    </div>

                    <!-- Order Menu -->
                    <a class="nav-link text-light" href="#" onclick="toggleSubMenu('orderMenu')">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-folder"></i></div>
                        Order
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div id="orderMenu" style="display: {{ request()->routeIs('manage.order') ? 'block' : 'none' }}; padding-left: 20px;">
                        <a class="nav-link {{ request()->routeIs('manage.order') ? 'active-link' : '' }}" href="{{route('manage.order')}}">Manage Order</a>
                    </div>
                @endif
            @endauth
            @endif

            {{-- Blog Section --}}
            @if(Route::has('login'))
            @auth
                @if(Auth::user()->usertype == 1)
                    <div class="sb-sidenav-menu-heading text-light">Blog</div>

                    <!-- Category Menu -->
                    <a class="nav-link text-light" href="#" onclick="toggleSubMenu('categoryMenu')">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div id="categoryMenu" style="display: {{ request()->routeIs('category.create') ? 'block' : 'none' }}; padding-left: 20px;">
                        <a class="nav-link {{ request()->routeIs('category.create') ? 'active-link' : '' }}" href="{{route('category.create')}}">Add Category</a>
                    </div>

                    <!-- Blogs Menu -->
                    <a class="nav-link text-light" href="#" onclick="toggleSubMenu('blogMenu')">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-rss"></i></div>
                        Blogs
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div id="blogMenu" style="display: {{ request()->routeIs('blog.*') ? 'block' : 'none' }}; padding-left: 20px;">
                        <a class="nav-link {{ request()->routeIs('blog.create') ? 'active-link' : '' }}" href="{{route('blog.create')}}">Add Blog</a>
                        <a class="nav-link {{ request()->routeIs('blog.index') ? 'active-link' : '' }}" href="{{route('blog.index')}}">Manage Blog</a>
                    </div>
                @endif
            @endauth
            @endif


         
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <x-app-layout>
            </x-app-layout>
        </div> --}}

    </nav>
</div>
<script>
    function toggleSubMenu(menuId) {
        var menu = document.getElementById(menuId);
        if (menu.style.display === "none" || menu.style.display === "") {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    }
</script>