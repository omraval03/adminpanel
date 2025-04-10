<style>
  .brand-image{
    display: block;
    width: 100px;
    height: auto; 
}
</style>
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="#" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="https://img.favpng.com/23/11/19/logo-online-and-offline-e-online-png-favpng-wqCyJcKkbPdvxArySgCadca9D.jpg"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">WedJoin</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
               data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            > 
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>Dashboard</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.contest')}}" class="nav-link">
                    <i class="nav-icon bi bi-camera"></i>
                    <p>Manage Contests</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.manage_category')}}" class="nav-link">
                    <i class="nav-icon bi bi-folder"></i>
                    <p>Manage Category</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.submissions')}}" class="nav-link">
                    <i class="nav-icon bi bi-images"></i>
                    <p>Submissions</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.submissions')}}" class="nav-link">
                    <i class="nav-iconbi bi bi-star"></i>
                    <p>Jury Scores</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{ route('admin.payment') }}" class="nav-link">
                    <i class="nav-icon bi bi-credit-card"></i>
                    <p>Payments Reprot</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.submissions')}}" class="nav-link">
                    <i class="nav-icon bi bi-bell"></i>
                    <p>Notifications</p>
                    </a>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Manage pages
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin.manage_about')}}" class="nav-link active">
                      <i class="nav-icon bi bi-info-circle"></i>
                      <p>About us</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                      <i class="nav-icon bi bi-telephone"></i>
                      <p>Contact us</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-house"></i>
                      <p>Home</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.jury_list')}}" class="nav-link">
                    <i class="nav-icon bi bi-people"></i>
                    <p>Jury list</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.user')}}" class="nav-link">
                    <i class="nav-icon bi bi-person-check"></i>
                    <p>User Managment</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.submissions')}}" class="nav-link">
                    <i class="nav-icon bi bi-trophy"></i>
                    <p>Winner list</p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="{{route('admin.submissions')}}" class="nav-link">
                    <i class="nav-icon bi bi-gear"></i>
                    <p>Setting & Configuration</p>
                    </a>
              </li>
             

            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>

      