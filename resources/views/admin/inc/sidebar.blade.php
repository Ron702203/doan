<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('clienthome')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <H6>PRODUCT CONTROLLER</H6>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.category')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Category</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.product')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Product</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.user')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>User</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.blog')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Blog</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.order')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Order</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->


</ul>