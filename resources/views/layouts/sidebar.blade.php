<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('manage.index')}}" <?php if(Auth::user()->accesslevel!=1) echo "hidden";?>>
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('device.index')}}">
                <i class="bi bi-menu-button-wide"></i><span>Devices</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('customer.index')}}">
                <i class="bi bi-people"></i><span>Customers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('rental.index')}}">
                <i class="bi bi-card-list"></i><span>Rental / Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('home')}}">
                <i class="bi bi-arrow-left-square"></i>
                <span>Back to Home Page</span>
            </a>
        </li>
        @if(Auth::user()->accesslevel==1)
        <li class="nav-heading">Management</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('staff.index')}}">
                <i class="bi bi-file-person"></i>
                <span>UCR Staff</span>
            </a>
        </li>
        @endif



</aside><!-- End Sidebar-->
