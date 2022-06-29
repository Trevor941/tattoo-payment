  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <img src="https://tattoo-me.co.za/wp-content/uploads/2022/06/logol.png" alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('appointments.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Appointments</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTattoo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-syringe"></i>
            <span>Tattoos List</span>
        </a>
        <div id="collapseTattoo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions</h6>
                <a class="collapse-item" href="{{route('tattoos.list')}}">Tattoo List</a>
                <a class="collapse-item" href="{{route('tattoos.add')}}">Add to Tattoo  List</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePiercing"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Piercing List</span>
        </a>
        <div id="collapsePiercing" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Actions</h6>
                <a class="collapse-item" href="{{route('piercings.list')}}">Piercing List</a>
                <a class="collapse-item" href="{{route('piercings.add')}}">Add to Piercing  List</a>
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