<!-------------------------------- Sidebar --------------------------->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon ">
            <img src="{{ asset('assets/img/purple_logo.jpg') }}" alt="" srcset="" width="100px" height="60px">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-cog"></i>
            <span>Dashboard </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
            <i class="fas fa-fw fa-cog"></i>
            <span>Service Provider</span>
        </a>
        <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/services">All Service Provider</a>
                <a class="collapse-item" href="/services/trash">Deleted Service Provider</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
            <i class="fas fa-fw fa-cog"></i>
            <span>End User</span>
        </a>
        <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/end-user">All End User</a>
                <a class="collapse-item" href="/end-user/trash">Deleted End User</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Bookings</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/bookings">Active Bookings</a>
                <a class="collapse-item" href="/bookings/closed">Closed Bookings</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/products">All Product</a>
                <a class="collapse-item" href="/products/approved">Approved Product</a>
                <a class="collapse-item" href="/products/trash">Deleted Products</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Payment</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/payments/end-user">Payments from End User</a>
                <a class="collapse-item" href="/payments/provider">Payments to Provider</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/contact">
            <i class="fas fa-fw fa-cog"></i>
            <span>Contact Form </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/reviews">
            <i class="fas fa-fw fa-cog"></i>
            <span>Reviews </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-cog"></i>
            <span>Returns </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>
        <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/category/add">Add Category</a>
                <a class="collapse-item" href="/category">All Category</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- Divider -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-------------------------------- End of Sidebar --------------------->