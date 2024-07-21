<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               
                <div class="sidebar-brand-text mx-3"> Turbo</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

                        <hr class="sidebar-divider my-0">

             <li class="nav-item @if(request()->segment(2) == "car") active @endif " >
                <a class="nav-link" href="{{route('dashboard.car.index')}}">
                    <i class="fa fa-car"></i>
                    <span>Car</span></a>
            </li>

             <li class="nav-item @if(request()->segment(2) == "car-model") active @endif " >
                <a class="nav-link" href="{{route('dashboard.car-model.index')}}">
                    <i class="fa-solid fa-car-on"></i>
                    <span>Car's Model</span></a>
            </li>
              <li class="nav-item @if(request()->segment(2) == "site-user") active @endif " >
                <a class="nav-link" href="{{ route('dashboard.site-user.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Site Users</span></a>
            </li>
             <li class="nav-item @if(request()->segment(2) == "advertisement") active @endif " >
                <a class="nav-link" href="{{ route('dashboard.advertisement.index') }}">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    <span>Advertisement</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

          

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->